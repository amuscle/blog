<?php
namespace app\modules\common\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseAdminController
 *
 * @author Administrator
 */
class BaseAdminController extends Controller{
    //put your code here
    
    public function init() {
        parent::init();
        
    }
    public function beforeAction($action) {
      //  parent::beforeAction($action);
    }

    public function goAdminHome()
    {
	return Yii::$app->getResponse()->redirect(['admin/index']);
    }
    
}
