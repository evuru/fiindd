<?php
namespace app\models;

use evuru\chintuaphpmvc\db\DatabaseModel;
//use evuru\chintuaphpmvc\Model;
use evuru\chintuaphpmvc\User;

class UserModel extends DatabaseModel implements User{
    const STATUS_ACTIVE=1;
    const STATUS_INACTIVE=0;
    const STATUS_DELETED=2;


    public string   $firstname='';
    public string   $lastname='';
    public string   $email='';
    public string   $password='';
    public string   $cpassword='';
    public string      $status = '';


    public function rules(): array{
        return [
            'email'=>[self::RULE_REQUIRED, self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>'4'], [self::RULE_MAX, 'max'=>'8']],
        ];
    }

    public static function tableName(): string{
        return 'u_users';
    }
    public static function primaryKey(): string{
        return 'id';
    }
    public function columns(): array {
        return ['firstname','lastname','email','password','status'];
    }
    public function labels():array{
        return [
            'firstname'=>'First Name',
            'lastname'=>'Last Name',
            'email'=>'Email Address',
            'password'=>'Password'
        ];
    }

    public function login(){
        return $this->findOne(["email" => $this->email]);
    }


    public function getDisplayName(): string
    {
        return $this->firstname." ".$this->lastname;
    }
}