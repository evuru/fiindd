<?php
namespace app\models;
use evuru\chintuaphpmvc\db\DatabaseModel;
use evuru\chintuaphpmvc\Model;

class RegisterModel extends DatabaseModel {
    const STATUS_ACTIVE=1;
    const STATUS_INACTIVE=0;
    const STATUS_DELETED=2;
    const STATUS_NV='Not Verified';


    public string   $firstname='';
    public string   $lastname='';
    public string   $email='';
    public string   $password='';
    public string   $cpassword='';
    public string      $status = self::STATUS_NV;


    public function rules(): array{
        return [
            'firstname'=>[self::RULE_REQUIRED],
            'lastname'=>[self::RULE_REQUIRED],
            'email'=>[self::RULE_REQUIRED, self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>'4'], [self::RULE_MAX, 'max'=>'8']],
            'cpassword'=>[self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']],
        ];
    }

    public static function tableName(): string{
        return 'u_users';
    }
    public function columns(): array {
        return ['firstname','lastname','email','password','status'];
    }
    public function labels():array{
        return [
            'firstname'=>'First Name',
            'lastname'=>'Last Name',
            'email'=>'Email Address',
            'password'=>'Password',
            'cpassword'=>'Confirm Password',
            'login'=>'Email or Password',
        ];
    }





    public function register(){
        if($this->emailExists()){
            $message = $this->errorMessages($this->labels()['email'])[self::RULE_UNIQUE] ?? '';
            $this->errors['email'][]= $message;
            return false;
        }
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
        return $this->save();
//        exit;
//        echo "new user in progress";
    }


    public static function primaryKey(): string
    {
        // TODO: Implement primaryKey() method.
    }
}