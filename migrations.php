<?php
/* RegisterModel: Espac */
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();
use evuru\chintuaphpmvc\Application;
use app\controllers\siteController;
use app\controllers\AuthController;

$config = ['db'=>['dsn'=>$_ENV['DB_DSN'],'user'=>$_ENV['DB_USER'],'password'=>$_ENV['DB_PASSWORD'],'dbName'=>$_ENV['DB_NAME']]];

$app = new Application(__DIR__,$config);

$app->db->applyMigrations();



//$app->router->get('/contact' , [new siteController, 'contact']);
//$app->router->post('/contact' , [new siteController, 'contact']);

//static functions are avilable no need for the neew keyword;