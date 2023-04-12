<?php
namespace app\models;
use evuru\chintuaphpmvc\Application;
use evuru\chintuaphpmvc\db\DatabaseModel;
use evuru\chintuaphpmvc\Model;

class LoginModel extends Model {
    const STATUS_ACTIVE=1;
    const STATUS_INACTIVE=0;
    const STATUS_DELETED=2;


    public string   $email='';
    public string   $password='';
    public string      $status = '';


    public function rules(): array{
        return [
            'email'=>[self::RULE_REQUIRED, self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>'4']],
        ];
    }

    public function labels():array{
        return [
            'email'=>'Email Address',
            'password'=>'Password',
            'login'=>'Email or Password',
        ];
    }



    public function login(){
        $user = UserModel::findOne(["email"=>$this->email]);

        if(!$user){
            $this->addError('login',self::RULE_INVALID);
            return false;
        }
        if(!password_verify($this->password,$user->password)){
            $this->addError('login',self::RULE_INVALID);
            return false;
        }

        return Application::$app->login($user);
    }


}