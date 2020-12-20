<?php

$params = require __DIR__.'/params.php';
$db = require __DIR__.'/db.php';
$mailer = require __DIR__.'/mailer.php';
$log = require __DIR__.'/log.php';

$config = [
    'id' => 'how-to',
    'name' => 'How-to',
    'charset' => 'UTF-8',
    'timeZone' => 'Europe/Lisbon',
    'language' => 'pt',
    'sourceLanguage' => 'pt',
    'basePath' => dirname(__DIR__),
    'layout' => 'main',
    'defaultRoute' => 'site/index',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@theme' => '@app/themes',
    ],
    'components' => [
        'formatter' => [
            'class' => 'app\components\CustomFormatter',
            'timeZone' => 'Europe/Lisbon',
            'defaultTimeZone' => 'Europe/Lisbon',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm',
            'dateFormat' => 'yyyy-MM-dd',
            'timeFormat' => 'HH:mm',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
            'locale' => 'pt-PT'
        ],
        'userAgent' => [
            'class' => 'app\components\UserAgent'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bqkmSfDLiuGi41oHE5YVGgksEzf5609Z',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => $mailer,
        'log' => $log,
        'user' => [
            'identityClass' => 'app\models\Admin',
            'on afterLogin' => function () {
                if (!Yii::$app->user->getIsGuest()) {
                    \app\models\Admin::updateAll(
                            ['latest_login' => date('Y-m-d H:i:s'), 'is_logged' => 1], ['id' => Yii::$app->user->id]
                    );
                }
            },
            'on beforeLogout' => function () {
                if (!Yii::$app->user->getIsGuest()) {
                    \app\models\Admin::updateAll(
                            ['is_logged' => 0], ['id' => Yii::$app->user->id]
                    );
                }
            },
            'enableAutoLogin' => true,
            'loginUrl' => ['/auth/login']
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<alias:index>' => 'site/<alias>',
                'article/<id:\d+>/<slug>' => 'article/view',
            ],
        ],
        'assetManager' => [
            'linkAssets' => false,
            'appendTimestamp' => true,
            'forceCopy' => false,
        // 'bundles' => [
        //     \yii\authclient\widgets\AuthChoiceStyleAsset::class => false,
        // ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'defaultRoute' => 'dashboard',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'panels' => [
            'httpclient' => [
                'class' => 'yii\\httpclient\\debug\\HttpClientPanel',
            ],
        ],
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
        'historySize' => 1000
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
