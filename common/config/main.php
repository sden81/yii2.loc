<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            //'class' => 'yii\caching\DummyCache',
            'class' => 'yii\caching\MemCache',
            'useMemcached' => true,
            'server' => [
                [
                    'host' => 'localhost',
                    'port' => 11211,
                ],
            ],
        ],

        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'frontend\components\AuthClients\Facebook',
                    'clientId' => '1883144511947436',
                    'clientSecret' => 'a3a2979c3493ecc6c8b56b58fa6c59d7',
                    'attributeNames' => [
                        'name',
                        'email',
                        'photos',
                        'gender',
                        'link'
                    ],
                ],
                'vkontakte' => [
                    'class' => 'frontend\components\AuthClients\Vk',
                    'clientId' => '6124578',
                    'clientSecret' => 'Xn3a1qaHTa0X12T9nmIS',
                ],
            ],
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smpt.yandex.ru',
                'username' => 'username',
                'password' => 'password',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],

        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['user'],
            'itemFile' => '@common/rbac/items.php',
            'assignmentFile' => '@common/rbac/assignments.php',
            'ruleFile' => '@common/rbac/rules.php'
        ],

        'db' => require(dirname(__DIR__) . '/config/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
            ],
        ],
    ],
    'aliases' => [
        'uploads' => '/frontend/web/uploads'
    ],
];
