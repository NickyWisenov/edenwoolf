<?php

$params = require(__DIR__ . '/params.php');
$baseUrl = str_replace('/web', '', (new \yii\web\Request)->getBaseUrl());

$config = [
    'id' => 'basic',
    'language' => 'en-US',
    'timeZone' => 'Asia/Kolkata',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
            'controllerMap' => [
                'comments' => 'cyneek\comments\controllers\ManageController'
            ], 
        ],
        'comment' => [
            'class' => 'cyneek\comments\Module',
            'userIdentityClass' => 'app\models\UserMaster',
            'controllerMap' => [
                'comments' => 'cyneek\comments\controllers\ManageController'
            ], 
            'useRbac' => true,

        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'vzCkuaXZ9KvMEOUV6h6sUid64hVZNfYl',
            'baseUrl' => $baseUrl,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\UserMaster',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => 'edenwoolf_frontend_user', // unique for frontend
                'httpOnly' => true,
            ],
            'loginUrl' => ['site/index'],
        ],
        'session' => [
            'class' => 'yii\web\Session',
            'name' => '_edenwoolffrontendSession', // unique for frontend
            'savePath' => sys_get_temp_dir(), // a temporary folder on backend
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com', // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'admin@edenwoolf.com',
                'password' => 'qxvbluxtqkerqtqn',
                'port' => '587', // Port 25 is a very common port too
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => include_once 'routes.php',
//            'rules' => [
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
//                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//            ],
        ],
//        'i18n' => [
//            'translations' => [
//                'app' => [
//                    'class' => 'yii\i18n\DbMessageSource',
//                    'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation']
//                ],
//            ],
//        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => []
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = [
//        'class' => 'yii\debug\Module',
//            // uncomment the following to add your IP if you are not connecting from localhost.
//            //'allowedIPs' => ['127.0.0.1', '::1'],
//    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
