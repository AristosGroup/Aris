<?php
/**
 * ERestFilter
 * 
 * Access filter for REST requests
 * Initializes and Attaches the ERestBehavior.
 *
 * @category   PHP
 * @package    Starship
 * @subpackage Restfullyii/filters
 * @copyright  Copyright (c) 2013 Evan Frohlich (https://github.com/evan108108)
 * @license    https://github.com/evan108108   OSS
 * @version    Release: 1.2.0
 */

namespace app\extensions\RestfullYii\filters;

use Yii;
use yii\base\ActionFilter;
use yii\web\HttpException;

use app\extensions\RestfullYii\events\ERestEvent;
use app\extensions\RestfullYii\behaviors\ERestBehavior;


class ERestFilter extends ActionFilter
{


    public $rules = array();

	/**
	 * preFilter
	 *
	 * logic being applied before the action is executed
	 * false if the action should not be executed
	 *
	 * @param (Object) (filterChain) the filterChain object
	 *
	 * @return (Mixed) false to deny access; $filterChain->run() to allow
	 */
    public function beforeAction($actionEvent)
	{
		$controller = $actionEvent->controller;

		$controller->attachBehavior('ERestBehavior','app\extensions\RestfullYii\behaviors\ERestBehavior');
		$controller->ERestInit();

		if( $controller->emitRest(ERestEvent::REQ_AUTH_HTTPS_ONLY) ) {
			if( !$this->validateHttpsOnly() ) {
				throw new HttpException(401, "You must use a secure connection");
			}
		}

		if( !$controller->emitRest(ERestEvent::REQ_AUTH_AJAX_USER) ) {
			if(!$controller->emitRest(ERestEvent::REQ_AUTH_USER, array(
				$controller->emitRest(ERestEvent::CONFIG_APPLICATION_ID),
				$controller->emitRest(ERestEvent::REQ_AUTH_USERNAME),
				$controller->emitRest(ERestEvent::REQ_AUTH_PASSWORD),
            ))) {
				throw new HttpException(401, "Unauthorized");
			}
		}

		return true;
	}

	/**
	 * postFilter
	 *
	 * logic being applied after the action is executed
	 *
	 * @param (Object) (filterChain) the filterChain object
	 */
    public function afterAction($actionEvent)
	{
        $controller = $actionEvent->controller->emitRest(ERestEvent::REQ_AFTER_ACTION, $actionEvent);
	}

	/**
	 * validateHttpsOnly
	 *
	 * checks if request is https
	 *
	 * @return (bool) returns true if the request protocol is https; false if not
	 */ 
	public final function validateHttpsOnly()
	{
		if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS']!='on'){
			return false;
		}
		return true;
	}
}

