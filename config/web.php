<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-Ru',
    'defaultRoute' => 'category/index',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'main',
            'defaultRoute' => '/order',
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            'imagesStorePath' => 'upload/store', //path to origin images
            'imagesCachePath' => 'upload/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => 'upload/store/no-image.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
        ],
    ],
	'components' => [
        'request' => [
			'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qazxswedcdcfvriudcushkcsulkvlvrevrege',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            //'loginUrl' => 'cart',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => '************@gmail.com',
                'password' => '************',
                'port' => '587',
                'encryption' => 'tls',
            ],
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
            'rules' => [
                'product/<id:\d+>' => 'product/view',

                'category/<id:\d+>/p/<page:\d+>' => 'category/view',
                'category/<id:\d+>' => 'category/view',

                'search/page/<page:\d+>' => 'category/search',
                'search' => 'category/search',
                'login' => 'site/login',

                'admin/order/p/<page:\d+>' => 'admin/order/index',
                'admin/order' => 'admin/order/index',
            ],
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'baseUrl'=>'/web',
                'path' => '/upload/global',
                'name' => 'Global'
            ],
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
		'allowedIPs' => ['::1', '127.0.0.1', '192.168.33.*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
		'allowedIPs' => ['::1', '127.0.0.1', '192.168.33.*'],
    ];
}

return $config;
