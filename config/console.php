<?php
$db = require __DIR__ . '/db.php';
$mailer = require __DIR__ . '/mailer.php';
$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                '@app/migrations',
                '@yii/rbac/migrations',
                '@vendor/polgarz/evolun-user/migrations',
                '@vendor/polgarz/evolun-event/migrations',
                '@vendor/polgarz/evolun-group/migrations',
                '@vendor/polgarz/evolun-kid/migrations',
                '@vendor/polgarz/evolun-post/migrations',
                '@vendor/polgarz/evolun-event/modules/comments/migrations',
                '@vendor/polgarz/evolun-event/modules/memo/migrations',
                '@vendor/polgarz/evolun-kid/modules/documents/migrations',
                '@vendor/polgarz/evolun-kid/modules/gallery/migrations',
                '@vendor/polgarz/evolun-kid/modules/notes/migrations',
            ],
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => $mailer,
        'urlManager' => [
            'baseUrl' => 'https://evolun.trau.hu',
            'hostInfo' => '',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'modules' => [
        'activity' => [
            'class' => 'evolun\activity\Module'
        ],
    ],
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
