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
    header('Location: http://localhost/OCR_Blog_P5/public/notFound.php');
 }

$controller = new $nameController;
$controller->$action();




