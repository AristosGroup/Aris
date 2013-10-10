<?php
Yii::import('RestfullYii.actions.ERestBaseAction');

/**
 * Action For Rest Deletes
 *
 * Provides the action for rest delete behavior
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
use yii\base\Action;
use app\extensions\RestfullYii\events\ERestEvent;

class EActionRestDELETE extends ERestBaseAction
{
	/**
	 * run
	 *
	 * Called by Yii for DELETE verb
	 * 
	 * @param (Mixed/Int) (id) unique identifier of the resource
	 * @param (Mixed) (param1) first param sent in the request; Often subresource name
	 * @param (Mixed) (param2) Second param sent in the request: Often subresource ID
	 */
	public function run($id=null, $param1=null, $param2=null) 
	{
    switch ($this->getRequestActionType($id, $param1, $param2, 'delete')) {
			case 'RESOURCES':
				throw new \HttpException('405', 'Method Not Allowed');
				break;
			case 'CUSTOM':
				$this->controller->emitRest("req.delete.$id.render", [$param1, $param2]);
				break;
			case 'SUBRESOURCES':
				throw new \HttpException('405', 'Method Not Allowed');
				break;
			case 'SUBRESOURCE':
				$this->controller->emitRest(ERestEvent::REQ_DELETE_SUBRESOURCE_RENDER, [
					$this->handleSubresourceDelete($id, $param1, $param2),
					$param1,
					$param2,
				]);
				break;
				break;
			case 'RESOURCE':
				$this->controller->emitRest(ERestEvent::REQ_DELETE_RESOURCE_RENDER, [$this->handleDelete($id)]);
				break;
			default:
				throw new \HttpException(404, "Resource Not Found");
		}
	}

	/**
	 * handleDelete
	 *
	 * Helper method for delete actions
	 *
	 * @param (Mixed/Int) (id) unique identifier of the resource to delete
	 *
	 * @return (Object) Returns the model of the deleted resource
	 */ 
	public function handleDelete($id)
	{
		$model = $this->controller->emitRest(
			ERestEvent::MODEL_ATTACH_BEHAVIORS,
			$this->getModel($id)
		);
		return $this->controller->emitRest(ERestEvent::MODEL_DELETE, [$model]);
	}

	/**
	 * handleSubresourceDelete
	 *
	 * Helper method for delete subresource actions
	 *
	 * @param (Mixed/Int) (id) unique identifier of the resource
	 * @param (String) (param1) name of the subresource
	 * @param (Mixed/Int) (id) unique identifier of the subresource to delete
	 *
	 * @return (Object) Returns the model containing the deleted subresource
	 */ 
	public function handleSubresourceDelete($id, $param1, $param2)
	{
		$model = $this->controller->emitRest(
			ERestEvent::MODEL_ATTACH_BEHAVIORS,
			$this->getModel($id)
		);
		return $this->controller->emitRest(ERestEvent::MODEL_SUBRESOURCE_DELETE, [$model, $param1, $param2]);
	}

}
