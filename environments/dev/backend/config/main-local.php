<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
            'parsers' => [ // wechat 因为模块中有使用angular.js  所以该设置是为正常解析angular提交post数据
                'application/json' => 'yii\web\JsonParser'
            ],
        ],

    ],
    'modules' => [
        'wechat' => [ // 指定微信模块
            'class' => 'callmez\wechat\Module',
            'adminId' => 1 // 填写管理员ID, 该设置的用户将会拥有wechat最高权限, 如多个请填写数组 [1, 2]
        ]
    ],
];

if (!YII_ENV_TEST) {
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
