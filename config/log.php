<?php

return [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
        ],
        [
            'class' => 'yii\log\EmailTarget',
            'levels' => ['error'],
            'message' => [
                'from' => ['log@how-to.com'],
                'to' => ['log@how-to.com'],
                'subject' => 'Errors ',
            ],
        ],
    ],
];
