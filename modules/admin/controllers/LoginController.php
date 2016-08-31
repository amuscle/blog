<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/26
 * Time: 17:19
 */

namespace app\modules\admin\controllers;

use app\models\LoginForm;
use yii\web\Controller;

class LoginController extends Controller
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
                'template' => '{image}',
                'options' => [
                    'calss' => 'J_codeimg',
                ],
            ]
        ];

    }

    function actionIndex(){

        $model = new LoginForm();

        return $this->renderPartial('index',['model' => $model]);
    }
}