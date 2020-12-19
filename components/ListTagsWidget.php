<?php

namespace app\components;

use app\models\ArticleTags;
use yii\base\Widget;

class ListTagsWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('list-tags/index', [
            'tags' => ArticleTags::find()
                ->orderBy(["name" => SORT_ASC])
                ->all()
        ]);
    }
}
