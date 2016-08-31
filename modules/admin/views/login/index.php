<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\captcha\Captcha;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台登录</title>
<meta name="author" content="DeathGhost">
<link rel="stylesheet" type="text/css" href="../css/style.css" tppabs="css/style.css">
<style>
body{height:100%;background:#000;overflow:hidden;}
    canvas{z-index:-1;position:absolute;}
</style>
<script src="../js/jquery.js"></script>
<script src="../js/verificationNumbers.js" tppabs="js/verificationNumbers.js"></script>
<script src="../js/Particleground.js" tppabs="js/Particleground.js"></script>
<script>
    $(document).ready(function() {
        //粒子背景特效
        $('body').particleground({
           dotColor: '#5cbdaa',
           lineColor: '#5cbdaa'
        });
  //验证码
  createCode();
  //测试提交，对接程序删除即可
  $(".submit_btn").click(function(){
      location.href="javascrpt:;"/*tpa=http://***index.html*/;
  });
});
</script>
</head>
<body>
<canvas class="pg-canvas" width="1920" height="924"></canvas>
<?=Html::beginForm('','',['id'=>'form']) ?>
    <dl class="admin_login">
        <dt>
            <strong>后台管理系统</strong>
            <em>Management System</em>
        </dt>
        <dd class="user_icon">
            <?=Html::activeInput('text',$model,'username',['class' => 'login_txtbx','placeholder'=>'账号']) ?>
        </dd>
        <dd class="pwd_icon">
            <?=Html::activeInput('password',$model,'password',['class' => 'login_txtbx','placeholder'=>'密码']) ?>
        </dd>
        <dd class="val_icon">
            <div class="checkcode">
                <?=Captcha::widget([
                    'model' => $model,
                    'attribute' => 'verifyCode',
                    'captchaAction' => 'login/captcha',
                    'template' => "{input}{image}",
                    'options' => [
                        'class' => 'login_txtbx',
                        'id' => 'J_codetext'
                    ],
                    'imageOptions' => [
                        'class' => 'J_codeimg',
                        'id' => 'myCanvas',
                        'alt' => '看不清'
                    ]
                ])
                ?>
            </div>
            <input type="button" value="验证码核验" class="ver_btn" onclick="validate();">
        </dd>
        <dd>
            <?=Html::submitButton('立即登陆',['class' => 'submit_btn']) ?>
        </dd>
        <dd>
            <p>
                <?=Html::error($model,'verifyCode',['class' => 'error']); ?>
                <?=Html::error($model,'password',['class' => 'error']); ?>
            </p>
        </dd>
    </dl>
<?=Html::endForm() ?>


</body>
</html>