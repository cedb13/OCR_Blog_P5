<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

define('ROOT', dirname(__DIR__));


require_once ROOT.'/App/Autoloader.php';
App\Autoloader::register();

$page='home';
$action='show';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

$nameController="App\Controllers\\".ucfirst($page)."Controller";


if(!class_exists($nameController) || !method_exists($nameController, $action)){
    header('Location: http://localhost/OCR_Blog_P5/public/');
 }

$controller = new $nameController;
$controller->$action();


/*if(! preg_match("/(\/css\/|\/js\/|\/assets\/)$/", $_SERVER['REQUEST_URI'])){

    $prefix = "/OCR_Blog_P5/public/index.php";
    $uri = $_SERVER['REQUEST_URI'];
    $url = str_replace($prefix, '',$uri );

    $pageController = 'HomeController';
    if ( $url === '/' || $url === '/home'){
        $pageController = 'HomeController';
        $action = 'show';
    } else if ($url === '/register') {
        $pageController = 'RegisterController';
        $action = 'show';
    }
    else if ($url === '/register/register') {
        $pageController = 'RegisterController';
        $action = 'register';
    } else if ($url === '/login') {
        $pageController = 'LoginController';
        $action = 'login';
    } else if ($url === '/logout') {
        $pageController = 'LoginController';
        $action = 'logout';
    }else if (preg_match("/\/post\/(\d+)/i", $url)) {
        $pageController = 'PostController';
        $action = 'show';
    } else if ($url === '/post') {
        $pageController = 'PostController';
        $action = 'list';
    
    } else{
        $action = 'notFound';
    }

    $nameController="App\Controllers\\".$pageController;

    $controller = new $nameController;
    $controller->$action();
    
    }*/



