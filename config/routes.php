<?php
return array(

    'GET api/<controller:\w+>'=>'<controller>/list',
    'GET api/<controller:\w+>/<id:\w*>'=>'<controller>/view',
    'GET api/<controller:\w+>/<id:\w*>/<param1:\w*>'=>'<controller>/REST.GET',
    'GET api/<controller:\w+>/<id:\w*>/<param1:\w*>/<param2:\w*>'=>'<controller>/REST.GET',


    'PUT api/<controller:\w+>/<id:\w*>'=>'<controller>/update',
    'POST api/<controller:\w+>'=>'<controller>/create',


/*    'GET api/<controller:\w+>'=>'<controller>/REST.GET',
    'GET api/<controller:\w+>/<id:\w*>'=>'<controller>/REST.GET',
    'GET api/<controller:\w+>/<id:\w*>/<param1:\w*>'=>'<controller>/REST.GET',
    'GET api/<controller:\w+>/<id:\w*>/<param1:\w*>/<param2:\w*>'=>'<controller>/REST.GET',*/

   /* array('<controller>/REST.PUT', 'pattern'=>'api/<controller:\w+>/<id:\w*>', 'verb'=>'PUT'),
    array('<controller>/REST.PUT', 'pattern'=>'api/<controller:\w+>/<id:\w*>/<param1:\w*>', 'verb'=>'PUT'),
    array('<controller>/REST.PUT', 'pattern'=>'api/<controller:\w*>/<id:\w*>/<param1:\w*>/<param2:\w*>', 'verb'=>'PUT'),

    array('<controller>/REST.DELETE', 'pattern'=>'api/<controller:\w+>/<id:\w*>', 'verb'=>'DELETE'),
    array('<controller>/REST.DELETE', 'pattern'=>'api/<controller:\w+>/<id:\w*>/<param1:\w*>', 'verb'=>'DELETE'),
    array('<controller>/REST.DELETE', 'pattern'=>'api/<controller:\w+>/<id:\w*>/<param1:\w*>/<param2:\w*>', 'verb'=>'DELETE'),

    array('<controller>/REST.POST', 'pattern'=>'api/<controller:\w+>', 'verb'=>'POST'),
    array('<controller>/REST.POST', 'pattern'=>'api/<controller:\w+>/<id:\w+>', 'verb'=>'POST'),
    array('<controller>/REST.POST', 'pattern'=>'api/<controller:\w+>/<id:\w*>/<param1:\w*>', 'verb'=>'POST'),
    array('<controller>/REST.POST', 'pattern'=>'api/<controller:\w+>/<id:\w*>/<param1:\w*>/<param2:\w*>', 'verb'=>'POST'),*/

    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
);