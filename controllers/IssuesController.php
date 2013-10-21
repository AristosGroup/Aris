<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 10.10.13
 * Time: 16:58
 * To change this template use File | Settings | File Templates.
 */

namespace app\controllers;

use Yii;
use yii\helpers\Json;
use yii\web\AccessControl;
use yii\web\Controller;
use app\extensions\RestfullYii\filters\ERestFilter;
use app\extensions\RestfullYii\actions\ERestActionProvider;
use app\models\Issue;




class IssuesController extends Controller {

    public $model = 'app\models\Issue';

 /*   public function behaviors()
    {
        return array(
            'access' => array(
                'class' => 'yii\web\AccessControl',
                'rules' => array(
                    array('allow' => true, 'actions' => array('admin'), 'roles' => array('@')),
                ),
            ),

            'rest'=> array(
               'class'=> 'app\extensions\RestfullYii\filters\ERestFilter',
                'rules'=>array(
                   array( 'actions'=>'REST.GET, REST.PUT, REST.POST, REST.DELETE',
                   'allow' => true,
                    'roles' => array('@')
                   )
                ),
            ),
        );
    }

    public function actions()
    {
        return array(
            'REST.GET'=>'app\extensions\RestfullYii\actions\EActionRestGET',
            'REST.'=>'app\extensions\RestfullYii\actions\ERestActionProvider',
        );
    }*/



    public function actionList()
    {


        $array = array(
            'issues'=>array(
                array('id'=>1,'subject'=>'2jhhu', 'tags'=>array(2,3), 'status'=>2),
                array('id'=>2,'subject'=>'3eerer', 'tags'=>array(1,3), 'status'=>1),
            )
        );

        $array['tags']=array(
            array( 'id'=>1, 'title'=>'Design'),
            array( 'id'=>2, 'title'=>'Dev'),
            array( 'id'=>3, 'title'=>'Testing'),
            array( 'id'=>4, 'title'=>'Верстка'),
        );

        $array['statuses']=array(
            array( 'id'=>1, 'name'=>'Open'),
            array( 'id'=>2, 'name'=>'Close'),

        );


        $result = Json::encode($array);

        header('Content-type: application/json');
        echo $result;
    }

    public function actionView($id)
    {
echo $id;
        die();
    }



}