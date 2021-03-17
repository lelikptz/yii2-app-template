<?php

use yii\log\FileTarget;
use yii\web\Response;

return [
    'id' => 'dto-over-api',
    'basePath' => dirname(__DIR__),
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
    ],
    'components' => [
        'response' => [
            'format' => Response::FORMAT_JSON,
        ],
        'log' => [
            'traceLevel' => defined('YII_DEBUG') ? 3 : 0,
            'targets' => [
                [
                    'class' => FileTarget::class,
                    'levels' => ['error', 'warning'],
                    'logFile' => '@runtime/logs/error.log',
                    'logVars' => [],
                ],
                [
                    'class' => FileTarget::class,
                    'levels' => ['info'],
                    'logFile' => '@runtime/logs/info.log',
                    'logVars' => [],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'post/<id:\d+>' => 'site/post',
            ],
        ],
    ],
    'params' => [],
];
