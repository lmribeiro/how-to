<?php

namespace app\models\behaviors;

use Imagine\Image\ManipulatorInterface;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\InvalidConfigException;
use yii\base\NotSupportedException;
use yii\db\BaseActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Url;

/**
 * UploadImageBehavior automatically uploads image, creates thumbnails and fills
 * the specified attribute with a value of the name of the uploaded image.
 *
 * To use UploadImageBehavior, insert the following code to your ActiveRecord class:
 *
 * ```php
 * use mohorev\file\UploadImageBehavior;
 *
 * function behaviors()
 * {
 *     return [
 *         [
 *             'class' => UploadImageBehavior::class,
 *             'thumbs' => ['image'=>'cover'],
 *         ],
 *     ];
 * }
 *
 * * function behaviors()
 * {
 *     return [
 *         [
 *             'class' => UploadImageBehavior::class,
 *             'thumbs' => ['cover'=>'cover','images'=>'gallery'],
 *         ],
 *     ];
 * }
 *
 * function behaviors()
 * {
 *     return [
 *         [
 *             'class' => UploadImageBehavior::class,
 *             'attribute' => 'file',
 *             'scenarios' => ['insert', 'update'],
 *             'placeholder' => '@app/modules/user/assets/images/userpic.jpg',
 *             'path' => '@webroot/upload/{id}/images',
 *             'url' => '@web/upload/{id}/images',
 *             'thumbPath' => '@webroot/upload/{id}/images/thumb',
 *             'thumbUrl' => '@web/upload/{id}/images/thumb',
 *             'thumbs' => [
 *                   'thumb' => ['width' => 400, 'quality' => 90],
 *                   'preview' => ['width' => 200, 'height' => 200],
 *              ],
 *         ],
 *     ];
 * }
 * ```
 *
 * @author Alexander Mohorev <dev.mohorev@gmail.com>
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
class UploadImageBehavior extends UploadBehavior
{
    /**
     * @var string
     */
    public $placeholder;
    /**
     * @var bool
     */
    public $createThumbsOnSave = true;
    /**
     * @var bool
     */
    public $createThumbsOnRequest = false;
    /**
     * Whether delete original uploaded image after thumbs generating.
     * Defaults to FALSE.
     *
     * @var bool
     */
    public $deleteOriginalFile = false;
    /**
     * @var array the thumbnail profiles
     *            - `width`
     *            - `height`
     *            - `quality`
     */
    public $thumbs = [
        'thumb' => ['width' => 200, 'height' => 200, 'quality' => 90],
    ];
    /**
     * @var string|null
     */
    public $thumbPath;
    /**
     * @var string|null
     */
    public $thumbUrl;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        if (!class_exists(Image::class)) {
            throw new NotSupportedException('Yii2-imagine extension is required to use the UploadImageBehavior');
        }

        parent::init();

        if ($this->createThumbsOnSave || $this->createThumbsOnRequest) {
            if ($this->thumbPath === null) {
                $this->thumbPath = $this->path;
            }
            if ($this->thumbUrl === null) {
                $this->thumbUrl = $this->url;
            }

            foreach ($this->thumbs as $config) {
                $width = ArrayHelper::getValue($config, 'width');
                $height = ArrayHelper::getValue($config, 'height');
                if ($height < 1 && $width < 1) {
                    throw new InvalidConfigException(sprintf(
                        'Length of either side of thumb cannot be 0 or negative, current size ' .
                            'is %sx%s',
                        $width,
                        $height
                    ));
                }
            }
        }
    }

    public function canGetProperty($name, $checkVars = true, $checkBehaviors = true)
    {
        if (in_array($name, \array_keys($this->thumbs))) {
            return true;
        }

        return parent::canGetProperty($name, $checkVars, $checkBehaviors);
    }

    public function __get($name)
    {
        if (in_array($name, \array_keys($this->thumbs))) {
            return $this->getThumb($this->attributes[0], $name);
        }

        return parent::__get($name);
    }

    public function __set($name, $value)
    {
        return parent::__set($name, $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function afterUpload()
    {
        parent::afterUpload();
        if ($this->createThumbsOnSave) {
            $this->createThumbs();
        }
    }

    private function _createThumbs($attribute)
    {
        $paths = $this->getUploadPath($attribute);
        foreach ($paths as $k => $path) {
            if (!is_file($path)) {
                return;
            }

            foreach ($this->thumbs as $profile => $config) {
                $thumbs = $this->getThumbUploadPath($attribute, $profile);
                if ($thumbs[$k] !== null) {
                    if (!FileHelper::createDirectory(dirname($thumbs[$k]))) {
                        throw new InvalidArgumentException(
                            "Directory specified in 'thumbPath' attribute doesn't exist or cannot be created."
                        );
                    }
                    if (!is_file($thumbs[$k])) {
                        $this->generateImageThumb($config, $path, $thumbs[$k]);
                    }
                }
            }
        }

        if ($this->deleteOriginalFile) {
            parent::delete($attribute);
        }
    }

    /**
     * @throws \yii\base\InvalidArgumentException
     */
    protected function createThumbs()
    {
        foreach ($this->attributes as $attribute) {
            $this->_createThumbs($attribute);
        }
    }

    /**
     * @param string $attribute
     * @param string $profile
     * @param bool   $old
     *
     * @return string
     */
    public function getThumbUploadPath($attribute, $profile = 'thumb', $old = false)
    {
        /** @var BaseActiveRecord $model */
        $model = $this->owner;
        $path = $this->resolvePath($this->thumbPath);
        $attribute = ($old === true) ? $model->getOldAttribute($attribute) : $model->$attribute;
        $urls = [];
        foreach (explode(',', $attribute) as $name) {
            $filename = $this->getThumbFileName($name, $profile);
            if ($filename) {
                $urls[] = Yii::getAlias($path . '/' . $filename);
            }
        }

        return $urls;
    }

    /**
     * @param string $attribute
     * @param string $profile
     *
     * @return string|null
     */
    public function getThumbUploadUrl($attribute, $profile = 'thumb', $prefix = false)
    {
        /** @var BaseActiveRecord $model */
        $model = $this->owner;

        if ($this->createThumbsOnRequest) {
            $this->createThumbs();
        }
        $urls = [];
        $fileName = explode(',', $model->getOldAttribute($attribute));
        foreach ($this->getThumbUploadPath($attribute, $profile) as $k => $path) {
            if (is_file($path)) {
                $url = $this->resolvePath($this->thumbUrl);
                $thumbName = $this->getThumbFileName($fileName[$k], $profile);
                $urls[] = ($prefix ? Url::home(true) : '') . Yii::getAlias($url . '/' . $thumbName);
            } elseif ($this->placeholder) {
                $urls[] = $this->getPlaceholderUrl($profile);
            }
        }

        return $urls;
    }

    /**
     * @param string $attribute
     * @param string $profile
     *
     * @return string|null
     */
    public function getThumb($attribute = null, $profile = 'thumb')
    {
        $attribute = $attribute ? $attribute : $this->attributes[0];
        $urls = $this->getThumbUploadUrl($attribute, $profile, true);

        return $urls[0];
    }

    /**
     * @param string $attribute
     * @param string $profile
     *
     * @return string|null
     */
    public function getThumbs($attribute = null, $profile = 'thumb')
    {
        $attribute = $attribute ? $attribute : $this->attributes[0];

        $urls = $this->getThumbUploadUrl($attribute || $this->attributes[0], $profile, true);
        if (count($urls) == 0) {
            return null;
        }

        return $urls;
    }

    /**
     * @param $profile
     *
     * @return string
     */
    protected function getPlaceholderUrl($profile)
    {
        list($path, $url) = Yii::$app->assetManager->publish($this->placeholder);
        $filename = basename($path);
        $thumb = $this->getThumbFileName($filename, $profile);
        $thumbPath = dirname($path) . DIRECTORY_SEPARATOR . $thumb;
        $thumbUrl = dirname($url) . '/' . $thumb;

        if (!is_file($thumbPath)) {
            $this->generateImageThumb($this->thumbs[$profile], $path, $thumbPath);
        }

        return $thumbUrl;
    }

    /**
     * {@inheritdoc}
     */
    protected function delete($attribute, $old = false)
    {
        parent::delete($attribute, $old);

        $profiles = array_keys($this->thumbs);
        foreach ($profiles as $profile) {
            $paths = $this->getThumbUploadPath($attribute, $profile, $old);
            foreach ($paths as $path) {
                if (is_file($path)) {
                    unlink($path);
                }
            }
        }
    }

    /**
     * @param $filename
     * @param string $profile
     *
     * @return string
     */
    protected function getThumbFileName($filename, $profile = 'thumb')
    {
        return $profile . '-' . $filename;
    }

    /**
     * @param $config
     * @param $path
     * @param $thumbPath
     */
    protected function generateImageThumb($config, $path, $thumbPath)
    {
        $width = ArrayHelper::getValue($config, 'width');
        $height = ArrayHelper::getValue($config, 'height');
        $quality = ArrayHelper::getValue($config, 'quality', 100);
        $mode = ArrayHelper::getValue($config, 'mode', ManipulatorInterface::THUMBNAIL_INSET);
        $bg_color = ArrayHelper::getValue($config, 'bg_color', 'FFF');

        if (!$width || !$height) {
            $image = Image::getImagine()->open($path);
            $ratio = $image->getSize()->getWidth() / $image->getSize()->getHeight();
            if ($width) {
                $height = ceil($width / $ratio);
            } else {
                $width = ceil($height * $ratio);
            }
        }

        // Fix error "PHP GD Allowed memory size exhausted".
        ini_set('memory_limit', '512M');
        Image::$thumbnailBackgroundColor = $bg_color;
        Image::thumbnail($path, $width, $height, $mode)->save($thumbPath, ['quality' => $quality]);
    }
}
