<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'sources/scss/style.scss',
        'sources/scss/components.css',
        'sources/scss/skins/reverse.scss',
        'sources/scss/skins/dark.scss',
        'css/custom.css',
        'css/toastr.min.css',
    ];
    public $js = [
        'js/stisla.js',
        'js/plugin/bootstrap-notify/bootstrap-notify.min.js',
        'js/custom.js',
        'js/toastr.min.js',
    ];
    public $depends = ['yii\web\YiiAsset', 'yii\bootstrap4\BootstrapAsset'];

}
