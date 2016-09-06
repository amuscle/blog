<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/6 0006
 * Time: 22:47
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;

class IndexController extends Controller
{

    function actionIndex(){
 
        return $this->render('index');

    }

}