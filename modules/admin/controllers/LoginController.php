<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/26
 * Time: 17:19
 */

namespace app\modules\admin\controllers;

use yii;
use app\models\LoginForm;
use app\modules\common\controllers\BaseAdminController;
class LoginController extends BaseAdminController
{
    function actions()
    {
        return [
            'captcha' => [
                'class'  => 'yii\captcha\CaptchaAction',
                'height' => '42',
                'width'  => '91',
                'minLength' => 4,
                'maxLength' => 4,
            ]
        ];
    }

    function actionIndex(){
        if (!Yii::$app->user->isGuest){
            return $this->goAdminHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goAdminHome();
        }else{
            return $this->renderPartial('index',['model' => $model]);
        }
    }
}