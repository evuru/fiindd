<?php
/* RegisterModel: Espac */
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createMutable(dirname(__DIR__));
$dotenv->load();
use evuru\chintuaphpmvc\Application;
use app\controllers\siteController;
use app\controllers\AuthController;

$config = ['db'=>['dsn'=>$_ENV['DB_DSN'],'user'=>$_ENV['DB_USER'],'password'=>$_ENV['DB_PASSWORD'],'dbName'=>$_ENV['DB_NAME']], 'userClass'=> \app\models\UserModel::class];

$app = new Application(dirname(__DIR__),$config);
//echo $app::$rootPath;exit;
$app->router->get('/home' ,function(){
    return " Hello World ";
});
$app->router->get('/aa' , fn() => " AA ");
//$app->router->get('/' ,"home");
$app->router->get('/' ,[siteController::class, 'home']);
$app->router->get('/home' ,[siteController::class, 'home']);
$app->router->get('/about' , [siteController::class, 'about']);
//$app->router->get('/contact' , 'contact');
$app->router->get('/contact' , [siteController::class, 'contact']);
$app->router->post('/contact' , [siteController::class, 'handleContact']);

$app->router->get('/login' , [AuthController::class, 'login']);
$app->router->post('/login' , [AuthController::class, 'login']);

$app->router->get('/register' , [AuthController::class, 'register']);
$app->router->post('/register' , [AuthController::class, 'register']);

$app->router->get('/logout' , [AuthController::class, 'logout']);
//$app->router->post('/logout' , [AuthController::class, 'logout']);
//$app->router->get('/logout' , fn()=>Application::$app->logout());
$app->router->get('/profile' , [AuthController::class, 'profile']);


$app->run();




//$app->router->get('/contact' , [new siteController, 'contact']);
//$app->router->post('/contact' , [new siteController, 'contact']);

//static functions are avilable no need for the neew keyword;