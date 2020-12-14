<?php

namespace app\modules\admin;

use Yii;

/**
 * kb module definition class
 */
class Module extends \yii\base\Module
{
	/**
	 * {@inheritdoc}
	 */
	public $controllerNamespace = 'app\modules\admin\controllers';
	public $layout = '@app/modules/admin/views/layouts/main';

	/**
	 * {@inheritdoc}
	 */
	public function init()
	{
		parent::init();

		// custom initialization code goes here
		Yii::$app->setHomeUrl('/admin/dashboard/index');
	}
}
