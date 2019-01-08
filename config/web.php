<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'ระบบจองรถออนไลน์',//ตั้งค่าชื่อระบบ Yii::$app->name
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'th-TH', // เปิดใช้งานภาษาไทย
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'EUvxwwbrD3UUPXeJWAOLPeNzS9x-JvEC',
        ],
        'view' => [
             'theme' => [
                 'pathMap' => [
                    '@app/views' => '@app/themes/adminlte'
                 ],
             ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'thaiFormatter'=>[
            'class'=>'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
       ],
        'assetManager' => [
    			'bundles' => [
    				'dosamigos\google\maps\MapAsset' => [
    				'options' => [
    					'key' => 'AIzaSyCUBBX2Iv905K2eZJ1NlUKqkvYMl7myoUU',// ใส่ API ตรงนี้ครับ
    					'language' => 'th',
    					'version' => '3.1.18'
    					]
    				],
            //
            'yii2mod\alert\AlertAsset' => [
                'css' => [
                    'dist/sweetalert.css',
                    'themes/twitter/twitter.css',
                ]
            ],
    			]
    		],
    ],
    'params' => $params,
    'modules' => [
       'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
