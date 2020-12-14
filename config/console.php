<?php

$params = require __DIR__.'/params.php';
$db = require __DIR__.'/db.php';
$log = require __DIR__.'/log.php';
$mailer = require __DIR__.'/mailer.php';

$config = [
    'id' => 'how-to-console',
    'name' => 'How-to | Knowledge base',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => $log,
        'db' => $db,
        'mailer' => $mailer,
    ],
    'modules' => [],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
