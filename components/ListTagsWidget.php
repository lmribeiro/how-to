<?php

namespace app\components;

use Yii;
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
        $tags = ArticleTags::find()
            ->orderBy(["name" => SORT_ASC])
            ->all();

        return $this->render('list-tags/index', [
            'tags' => $tags
        ]);
    }
}
