<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\ArticleCategorySearch;

class ListCategoriesWidget extends Widget
{
    public $id;
    public $model;
    public $badge;

    public function init()
    {
        parent::init();

        $searchModel = new ArticleCategorySearch();
        $categoryProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categoryProvider->sort = ['defaultOrder' => ["name" => SORT_ASC]];
        $this->model = $categoryProvider;
    }

    public function run()
    {
        return $this->render('list-categories/index', [
            'categoryProvider' => $this->model,
        ]);
    }
}
