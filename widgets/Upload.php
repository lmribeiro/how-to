<?php

namespace app\widgets;

use Yii;
use yii\base\InvalidConfigException;

class Upload extends \kartik\file\FileInput
{
    public $attr;
    public $model;
    public $deleteUrl;
    public $multiple = false;

    public $linkyaOptions = [
        'accept' => 'image/png, image/jpeg',
        'multiple' => false,
      ];

    public $linkyaPluginOptions = [
        'initialPreviewAsData' => true,
        'overwriteInitial' => true,
        'maxFileSize' => 2000,
        'showPreview' => true,
        'showCaption' => true,
        'showRemove' => false,
        'showUpload' => false,
        'showCancel' => false,
    ];

    private function initial()
    {
        if (!(isset($this->model->{$this->attr}) && $this->model->{$this->attr} != '')) {
            return false;
        }

        return $this->model->getThumb($this->attr);
    }

    private function initLinkya()
    {
        $this->options = \array_merge(
          $this->linkyaOptions, [
            'multiple' => $this->multiple,
          ],
          $this->options
        );
        $this->pluginOptions = \array_merge(
          $this->linkyaPluginOptions, [
            'layoutTemplates' => [
              'footer' => '',
            ],

            'initialPreviewShowDelete' => false,
            'initialPreview' => $this->initial(),
            'initialCaption' => Yii::t('app', 'Tamanho recomendado 750 x 500px'),
            'initialPreviewConfig' => [
              ['caption' => Yii::t('app', 'Imagem'), 'size' => '', 'key' => $this->model->id],
            ],
          ],
          $this->pluginOptions
        );

        $this->pluginEvents = \array_merge(
          [
          'fileclear' => 'function(ev,data) { 
            console.log(ev,data)
            setTimeout(function(){
              alert("all images deleted");
              $(this).trigger("fileclear",[ "Custom", "Event" ])
              return true;
            },400)                      
            return false;
          }',
          ], $this->pluginEvents
        );

        if (!$this->deleteUrl) {
            throw new InvalidConfigException('The "deleteUrl" property must be set.');
        }
    }

    public function run()
    {
        $this->initLinkya();
        /*  \var_dump($this->pluginOptions);
         die; */

        return $this->initWidget();
    }
}
