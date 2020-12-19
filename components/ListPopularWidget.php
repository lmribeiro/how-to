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
        $this->model = $searchModel->search(Yii::$app->request->queryParams);
        $this->model->sort = ['defaultOrder' => ['views' => SORT_DESC]];
    }

    public function run()
    {
        return $this->render('list-popular/index', [
            'articleProvider' => $this->model
        ]);
    }
}
