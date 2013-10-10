<?php
$params = require(__DIR__ . '/params.php');
$routes = require(__DIR__ . '/routes.php');
$config = array(
	'id' => 'bootstrap',
	'basePath' => dirname(__DIR__),
	'components' => array(
		'request' => array(
			'enableCsrfValidation' => true,
		),
		'cache' => array(
			'class' => 'yii\caching\FileCache',
		),
		'user' => array(
			'identityClass' => 'app\models\User',
		),
		'errorHandler' => array(
			'errorAction' => 'site/error',
		),
		'log' => array(
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => array(
				array(
					'class' => 'yii\log\FileTarget',
					'levels' => array('error', 'warning'),
				),
			),
		),

        'db'=>array(
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=pm',
            'username' => 'redmine',
            'password' => 'yLMId0zi',
            'charset' => 'utf8',
        ),

        'urlManager'=>array(
'enablePrettyUrl'=>true,
            'rules'=>$routes

	),
	'params' => $params,
));

if (YII_ENV_DEV) {
	$config['preload'][] = 'debug';
	$config['modules']['debug'] = 'yii\debug\Module';
	$config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
