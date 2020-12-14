<?php

namespace app\widgets;

use Yii;

class Modals extends \yii\bootstrap\Widget
{
    public $modals = [];

    public $folder = 'modules/admin/views/layouts/modals';

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        if (empty($this->modals)) {
            return;
        }
        $result = array_unique($this->modals);
        foreach ($result as $link) {
            include Yii::$app->basePath."/$this->folder/$link.php";
        }
    }
}
