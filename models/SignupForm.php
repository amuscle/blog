<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 19:00
 */

namespace app\models;


use yii\base\Model;
use app\models\User;
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['username','trim'],
            ['username','required'],
            ['username','string','min'=>2,'max'=>40],
            ['email','trim'],
            ['email','required'],
            ['email','email'],
            ['email','string','max' => 255],
            ['email','unique','targetClass'=>'\app\models\User','message'=>'该邮箱已经存在!'],
            ['password','required'],
            ['password','string','min' => 6]

        ];
    }

    public function signup(){
        if(!$this->validate()){//验证不通过
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);  //加密密码
        $user->generateAuthKey(); //生成记住我 身份验证秘钥。
        return $user->save() ? $user : null;
    }

}