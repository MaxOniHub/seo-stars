<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'main',
    'language' => 'ru',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => ''
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''=>'main/index',
                'raiting'=>'main/raiting',
                'all-pages'=>'main/pages',
                'page/<alias>'=>'main/page',
                'company/<alias>'=>'main/company',
                
                'persons'=>'person/persons',
                'person/getraiting'=>'person/getraiting',
                'person/logout/<alias>'=>'person/logout',
                'person/<alias>'=>'person/person',
                
                'services'=>'service/services',
                'service/getraiting'=>'service/getraiting',
                'service/logout/<alias>'=>'service/logout',
                'service/<alias>'=>'service/service',
                
                'conferences'=>'conference/conferences',
                'conference/getraiting'=>'conference/getraiting',
                'conference/logout/<alias>'=>'conference/logout',
                'conference/<alias>'=>'conference/conference',
                
                'about'=>'main/about',
                'contact'=>'main/contact',

                'types/<slug>' => 'activity-directions/get-by-type',
                'app' => 'request-service/request',
            ],
        ],
        /*'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6Lf0PSoUAAAAAI6ae2q-pEyup8BgdQ81P9laYI_t',
            'secret' => '6Lf0PSoUAAAAAHbRNiMvDYO268ROEK1z9icL_zjj',
        ],*/
        'recaptcha' => [
            'class' => 'recaptcha\ReCaptchaComponent',
            'siteKey' => '6Lf0PSoUAAAAAI6ae2q-pEyup8BgdQ81P9laYI_t',
            'secretKey' => '6Lf0PSoUAAAAAHbRNiMvDYO268ROEK1z9icL_zjj',
        ],
            
    ],
    'params' => $params,
];
