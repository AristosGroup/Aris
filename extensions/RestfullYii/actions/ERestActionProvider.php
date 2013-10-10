<?php


/**
 * Action Provider Widget
 *
 * Provides the actions for RestfullYii events
 *
 * @category   PHP
 * @package    Starship
 * @subpackage Restfullyii/actions
 * @copyright  Copyright (c) 2013 Evan Frohlich (https://github.com/evan108108)
 * @license    https://github.com/evan108108   OSS
 * @version    Release: 1.2.0
 */

namespace app\extensions\RestfullYii\actions;

use Yii;
use yii\base\Widget;

class ERestActionProvider extends Widget
{
	/**
	 * actions
	 *
	 * @return (Array) List of actions and their ID's
	 */ 
	public static function actions() 
	{

		return [
			'GET'=>'app\extensions\RestfullYii\actions\EActionRestGET',
			'PUT'=>'app\extensions\RestfullYii\actions\EActionRestPUT',
			'POST'=>'app\extensions\RestfullYii\actions\EActionRestPOST',
			'DELETE'=>'app\extensions\RestfullYii\actions\EActionRestDELETE',
		];
	}
}
