<?php
namespace app\controllers;

use evuru\chintuaphpmvc\Application;
use evuru\chintuaphpmvc\controller;
use evuru\chintuaphpmvc\request;

class siteController extends Controller {
    public function __construct(){
        $this->setLayout('main');
    }

    public function home(){
        $params = [
            "name"=>"Chintua",
        ];
        if ($_SERVER['REQUEST_METHOD']==='GET'){
            return $this->render('home',$params);
        }
    }
    public function about(Request $request){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->render('about');
        }
    }
    public function contact(Request $request){
        if($request->isGET()) {
            return $this->render('contact');
        }
        if($request->isPost()){
            echo "<pre>";
            print_r($request->getbody());
            echo "</pre>";
            return $this->handleContact();
        }
    }
    public function handleContact(){
        return "handling submitted data";
    }



}