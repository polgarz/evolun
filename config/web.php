<?php

$db = require __DIR__ . '/db.php';
$mailer = require __DIR__ . '/mailer.php';
$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'basic',
    'name' => 'Evolun',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'languagepicker', 'activity'],
    'language' => 'hu-HU',
    'sourceLanguage' => 'en-US',
    'timeZone' => 'UTC',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'languagepicker' => [
            'class' => 'lajax\languagepicker\Component',
            'languages' => ['hu-HU' => 'Magyar', 'en-US' => 'English']
        ],
        'formatter' => [
            'defaultTimeZone' => 'UTC',
        ],
        'i18n' => [
            'translations' => [
                'menu' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'menu' => 'menu.php',
                    ],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
            // ezzel (es a gyokerben levo .htaccess-el) tuntetjuk el a /web/ -t az urlbol
            'baseUrl' => str_replace('/web', '', (new \yii\web\Request)->getBaseUrl()),
        ],
        'assetManager' => [
            'forceCopy' => YII_ENV_DEV,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'evolun\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/default/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => $mailer,
        'log' => [
            'traceLevel' => YII_DEBUG ? 8 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'modules' => [
        'post' => [
            'class' => 'evolun\post\Module',
        ],
        'activity' => [
            'class' => 'evolun\activity\Module',
        ],
        'user' => [
            'class' => 'evolun\user\Module',
            'userSearchModel' => 'evolun\group\models\UserSearch',
            'userTemplates' => ['tools' => '@vendor/polgarz/evolun-group/views/user/_tools'],
            'widgets' => [
                \evolun\group\widgets\UserGroup::class,
                \evolun\user\widgets\Responsible::class,
            ],
            'modules' => [
                'profile' => [
                    'class' => 'evolun\user\modules\profile\Module',
                ],
                'event' => [
                    'class' => 'evolun\user\modules\event\Module',
                ],
            ]
        ],
        'group' => [
            'class' => 'evolun\group\Module',
        ],
        'kid' => [
            'class' => 'evolun\kid\Module',
            'modules' => [
                'notes' => [
                    'class' => 'evolun\kid\modules\notes\Module',
                    'allowedGroupIds' => [1],
                ],
                'gallery' => [
                    'class' => 'evolun\kid\modules\gallery\Module',
                ],
                'documents' => [
                    'class' => 'evolun\kid\modules\documents\Module',
                ],
            ],
            'widgets' => [
                \evolun\kid\widgets\ResponsibleUsers::class,
                \evolun\kid\widgets\Absences::class,
                \evolun\kid\widgets\OtherData::class,
            ]
        ],
        'event' => [
            'class' => 'evolun\event\Module',
            'modules' => [
                'participates' => [
                    'class' => 'evolun\event\modules\participates\Module',
                ],
                'description' => [
                    'class' => 'evolun\event\modules\description\Module',
                ],
                'comments' => [
                    'class' => 'evolun\event\modules\comments\Module',
                ],
                'memo' => [
                    'class' => 'evolun\event\modules\memo\Module',
                ],
                'absence' => [
                    'class' => 'evolun\event\modules\absence\Module',
                    'allowedCategoryIds' => ['study'],
                ],
            ],
        ],
    ],
    'params' => $params
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
