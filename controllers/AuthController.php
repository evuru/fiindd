<?php


namespace app\controllers;

use evuru\chintuaphpmvc\Application;
use evuru\chintuaphpmvc\Controller;
use evuru\chintuaphpmvc\middleWares\AuthMiddleWare;
use app\models\LoginModel;
use app\models\RegisterModel;

class AuthController extends Controller{
    public function __construct(){
        $this->setLayout('auth');
        $this->registerMiddleWare(new AuthMiddleWare(['profile']));

    }

    public function login($request){
        $this->isLoggedIn();

        if($request->isPost()) {
            $loginModel = new LoginModel();
            $loginModel->loadData($request->getBody());
            if($loginModel->login()){
                Application::$app->session->setFlash('success','Welcome Back');
                Application::$app->response->redirect('/home');
            }
            return $this->render('login',['model'=>$loginModel]);
        }
        return $this->render('login',['model'=>new LoginModel]);
    }

    public function register($request){
        $this->isLoggedIn();

        if($request->isPost()) {
            $registerModel = new RegisterModel();
            $registerModel->loadData($request->getBody());


            if($registerModel->validate()&&$registerModel->register()){
                Application::$app->session->setFlash('success','Registration successful');
                Application::$app->response->redirect('/home');
            }
            return $this->render('register',['model'=>$registerModel]);
        }
        return $this->render('register',['model'=>new RegisterModel]);
    }


    public function isLoggedIn(){
        if(!Application::$app::isGuest()){
            Application::$app->session->setFlash('success','Still Logged in');
            Application::$app->response->redirect('/home');
        }
    }
    public function logout($request){
        if(Application::$app->logout()){
            Application::$app->session->setFlash('success','Logged out');
            Application::$app->response->redirect('/home');
        }
    }
    public function profile(){
        return $this->render('profile');

    }
}