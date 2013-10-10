<?php
$params = require(__DIR__ . '/params.php');
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

            'rules'=>array(
                'api/<controller:\w+>'=>array('<controller>/restList', 'verb'=>'GET'),
                'api/<controller:\w+>/<id:\w+>'=>array('<controller>/restView', 'verb'=>'GET'),
                'api/<controller:\w+>/<id:\w+>/<var:\w+>'=>array('<controller>/restView','verb'=>'GET'),
                array('<controller>/restUpdate', 'pattern'=>'api/<controller:\w+>/<id:\d+>', 'verb'=>'PUT'),
                array('<controller>/restDelete', 'pattern'=>'api/<controller:\w+>/<id:\d+>', 'verb'=>'DELETE'),
                array('<controller>/restCreate', 'pattern'=>'api/<controller:\w+>', 'verb'=>'POST'),
                array('<controller>/restCreate', 'pattern'=>'api/<controller:\w+>/<id:\w+>', 'verb'=>'POST'),

                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        )

	),
	'params' => $params,
);

if (YII_ENV_DEV) {
	$config['preload'][] = 'debug';
	$config['modules']['debug'] = 'yii\debug\Module';
	$config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
