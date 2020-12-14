<?php

namespace app\models\behaviors;

use Closure;
use Yii;
use yii\base\Behavior;
use yii\base\InvalidArgumentException;
use yii\db\BaseActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * UploadBehavior automatically uploads file and fills the specified attribute
 * with a value of the name of the uploaded file.
 *
 * To use UploadBehavior, insert the following code to your ActiveRecord class:
 *
 * ```php
 * use mohorev\file\UploadBehavior;
 *
 * function behaviors()
 * {
 *     return [
 *         [
 *             'class' => UploadBehavior::class,
 *             'attribute' => 'file',
 *             'scenarios' => ['insert', 'update'],
 *             'path' => '@webroot/upload/{id}',
 *             'url' => '@web/upload/{id}',
 *         ],
 *     ];
 * }
 * ```
 *
 * @author Alexander Mohorev <dev.mohorev@gmail.com>
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
class UploadBehavior extends Behavior
{
    /**
     * @event Event an event that is triggered after a file is uploaded.
     */
    const EVENT_AFTER_UPLOAD = 'afterUpload';

    /**
     * @event Event an event that is triggered on init.
     */
    const EVENT_BEFORE_INIT = 'beforeInit';

    /**
     * @var string the attribute which holds the attachment
     */
    public $attributes;
    /**
     * @var array the scenarios in which the behavior will be triggered
     */
    public $scenarios = [];
    /**
     * @var string the base path or path alias to the directory in which to save files
     */
    public $path;
    /**
     * @var string the base URL or path alias for this file
     */
    public $url;
    /**
     * @var bool Getting file instance by name
     */
    public $instanceByName = false;
    /**
     * @var bool|callable generate a new unique name for the file
     *                    set true or anonymous function takes the old filename and returns a new name
     *
     * @see self::generateFileName()
     */
    public $generateNewName = true;
    /**
     * @var bool If `true` current attribute file will be deleted
     */
    public $unlinkOnSave = true;
    /**
     * @var bool if `true` current attribute file will be deleted after model deletion
     */
    public $unlinkOnDelete = true;
    /**
     * @var bool whether to delete the temporary file after saving
     */
    public $deleteTempFile = true;

    /**
     * @var UploadedFile the uploaded file instance
     */
    private $_files = [];
    public $_prev = [];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function events()
    {
        return [
            BaseActiveRecord::EVENT_INIT => 'modelInit',
            BaseActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            BaseActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
            BaseActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
            BaseActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            BaseActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
            BaseActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];
    }

    /**
     * This method is invoked before validation starts.
     */
    public function modelInit()
    {
        $this->owner->trigger(self::EVENT_BEFORE_INIT);
    }

    /**
     * This method is invoked before validation starts.
     */
    public function beforeValidate()
    {
        /** @var BaseActiveRecord $model */
        $model = $this->owner;
        if (in_array($model->scenario, $this->scenarios)) {
            foreach ($this->attributes as $attribute) {
                $v = $model->getAttribute($attribute);
                $isMultiple = is_array($v);

                if ($file = ($isMultiple && $v[0] != '') ? $v : null) {
                    $this->_files[$attribute] = $file;
                } else {
                    $this->_files[$attribute] = is_array($model->{$attribute}) ? UploadedFile::getInstances($model, $attribute) : [UploadedFile::getInstance($model, $attribute)];
                }
                $files = [];
                foreach ($this->_files[$attribute] as $f) {
                    if ($f instanceof UploadedFile) {
                        $f->name = $this->getFileName($f);
                        $files[] = $f;
                    }
                }
                $names = [];
                foreach ($files as $fn) {
                    $names[] = $fn->name;
                }
                if (count($files) > 0) {
                    $model->setAttribute($attribute, implode(',', $names));
                }
            }
        }
    }

    /**
     * This method is called at the beginning of inserting or updating a record.
     */
    public function beforeSave()
    {
        /** @var BaseActiveRecord $model */
        $model = $this->owner;

        foreach ($this->attributes as $attribute) {
            if (in_array($model->scenario, $this->scenarios)) {
                $files = [];
                foreach ($this->_files[$attribute] as $f) {
                    if ($f instanceof UploadedFile) {
                        $files[] = $f;
                    }
                }

                if (count($files) > 0) {
                    if (!$model->getIsNewRecord() && $model->isAttributeChanged($attribute)) {
                        if ($this->unlinkOnSave === true) {
                            $this->delete($attribute, true);
                        }
                    }
                    $names = [];
                    foreach ($files as $fn) {
                        $names[] = $fn->name;
                    }

                    $model->setAttribute($attribute, implode(',', $names));
                } else {
                    unset($model->{$attribute});
                }
            } else {
                if (!$model->getIsNewRecord() && $model->isAttributeChanged($attribute)) {
                    if ($this->unlinkOnSave === true) {
                        $this->delete($attribute, true);
                    }
                }
            }
        }
    }

    /**
     * This method is called at the end of inserting or updating a record.
     *
     * @throws \yii\base\InvalidArgumentException
     */
    public function afterSave()
    {
        $model = $this->owner;
        if (in_array($model->scenario, $this->scenarios)) {
            foreach ($this->attributes as $attribute) {
                $files = [];
                $paths = $this->getUploadPath($attribute);
                foreach ($this->_files[$attribute] as $k => $f) {
                    if ($f instanceof UploadedFile) {
                        if (is_string($paths[$k]) && FileHelper::createDirectory(dirname($paths[$k]))) {
                            $this->save($f, $paths[$k]);
                        } else {
                            throw new InvalidArgumentException(
                                "Directory specified in 'path' attribute doesn't exist or cannot be created."
                            );
                        }
                    }
                }
                $this->afterUpload();
            }
        }
    }

    /**
     * This method is invoked after deleting a record.
     */
    public function afterDelete()
    {
        foreach ($this->attributes as $attribute) {
            if ($this->unlinkOnDelete && $attribute) {
                $this->delete($attribute);
            }
        }
    }

    /**
     * Returns file path for the attribute.
     *
     * @param string $attribute
     * @param bool   $old
     *
     * @return string|null the file path
     */
    public function getUploadPath($attribute, $old = false)
    {
        /** @var BaseActiveRecord $model */
        $model = $this->owner;
        $path = $this->resolvePath($this->path);
        $attribute = ($old === true) ? $model->getOldAttribute($attribute) : $model->$attribute;
        $urls = [];
        foreach (explode(',', $attribute) as $filename) {
            if ($filename) {
                $urls[] = Yii::getAlias($path . '/' . $filename);
            }
        }

        return $urls;
    }

    /**
     * Returns file url for the attribute.
     *
     * @param string $attribute
     *
     * @return string|null
     */
    public function getUploadUrl($attribute)
    {
        /** @var BaseActiveRecord $model */
        $model = $this->owner;
        $url = $this->resolvePath($this->url);
        $fileName = $model->getOldAttribute($attribute);

        return $fileName ? Yii::getAlias($url . '/' . $fileName) : null;
    }

    /**
     * Returns the UploadedFile instance.
     *
     * @return UploadedFile
     */
    protected function _getUploadedFile($attribute)
    {
        return $this->_files[$attribute];
    }

    /**
     * Replaces all placeholders in path variable with corresponding values.
     */
    protected function resolvePath($path)
    {
        /** @var BaseActiveRecord $model */
        $model = $this->owner;

        return preg_replace_callback('/{([^}]+)}/', function ($matches) use ($model) {
            $name = $matches[1];
            $attribute = ArrayHelper::getValue($model, $name);
            if (is_string($attribute) || is_numeric($attribute)) {
                return $attribute;
            } else {
                return $matches[0];
            }
        }, $path);
    }

    /**
     * Saves the uploaded file.
     *
     * @param UploadedFile $file the uploaded file instance
     * @param string       $path the file path used to save the uploaded file
     *
     * @return bool true whether the file is saved successfully
     */
    protected function save($file, $path)
    {
        return $file->saveAs($path, $this->deleteTempFile);
    }

    /**
     * Deletes old file.
     *
     * @param string $attribute
     * @param bool   $old
     */
    protected function delete($attribute, $old = false)
    {
        $paths = $this->getUploadPath($attribute, $old);
        foreach ($paths as $path) {
            if (is_file($path)) {
                unlink($path);
            }
        }
    }

    /**
     * @param UploadedFile $file
     *
     * @return string
     */
    protected function getFileName($file)
    {
        if ($this->generateNewName) {
            return $this->generateNewName instanceof Closure
                ? call_user_func($this->generateNewName, $file)
                : $this->generateFileName($file);
        } else {
            return $this->sanitize($file->name);
        }
    }

    /**
     * Replaces characters in strings that are illegal/unsafe for filename.
     *
     * #my*  unsaf<e>&file:name?".png
     *
     * @param string $filename the source filename to be "sanitized"
     *
     * @return bool string the sanitized filename
     */
    public static function sanitize($filename)
    {
        return str_replace([' ', '"', '\'', '&', '/', '\\', '?', '#'], '-', $filename);
    }

    /**
     * Generates random filename.
     *
     * @param UploadedFile $file
     *
     * @return string
     */
    protected function generateFileName($file)
    {
        return uniqid() . '.' . $file->extension;
    }

    /**
     * This method is invoked after uploading a file.
     * The default implementation raises the [[EVENT_AFTER_UPLOAD]] event.
     * You may override this method to do postprocessing after the file is uploaded.
     * Make sure you call the parent implementation so that the event is raised properly.
     */
    protected function afterUpload()
    {
        $this->owner->trigger(self::EVENT_AFTER_UPLOAD);
    }
}
