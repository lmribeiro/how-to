<?php

namespace app\components;

use Yii;
use app\models\ArticleSearch;
use yii\base\Widget;

class ListPopularWidget extends Widget
{
    public $model;

    public function init()
    {
        parent::init();

        $searchModel = new ArticleSearch();
        $articleProvider = $searchModel->search(Yii::$app->request->queryParams);
        $articleProvider->sort = ['defaultOrder' => ['views' => SORT_DESC]];
        $this->model = $articleProvider;
    }

    public function run()
    {
        return $this->render('list-popular/index', [
            'articleProvider' => $this->model
        ]);
    }
}
