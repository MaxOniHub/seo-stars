<?php
$db = [
    "prod"=>[
        "host"=> 'credit06.mysql.ukraine.com.ua',
        "dbname" => 'credit06_seostar',
        "username" => 'credit06_seostar',
        "password" => 'ennkbjny'
    ],
    "dev" => [
        "host"=> 'localhost',
        "dbname" => 'seo_stars',
        "username" => 'root',
        "password" => ''
    ],
];

$current_db = $db['dev'];

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.$current_db["host"].';dbname='.$current_db["dbname"].'',
    'username' => $current_db["username"],
    'password' => $current_db["password"],
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 3600,
    'schemaCache' => 'cache',
];
