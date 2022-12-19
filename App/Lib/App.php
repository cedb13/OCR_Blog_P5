<?php
namespace App\Lib;

use App\Lib\Database;

class App{

    const DB_NAME = 'blog_pro_p5';
    const DB_USER = 'root';
    const DB_PASS = '#@root@#';
    const DB_HOST = 'localhost';


    private static $title = 'Mon CV en ligne';
    private static $database;
    private static $_instance;


    public static function getinstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function getTable($name){
        $class_name = 'App\\Model\\'. ucfirst($name);
        return new $class_name();
    }


    public static function getDb(){
        if( self::$database === null){
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$database;

    }

    public static function notFound(){
        header("HTTP/1.0 404 Not Found");
        header('Location:index.php?page=404');
    }

    public static function getTitle(){
        return self::$title;
    }

    public static function setTitle($title){
        self::$title = $title . '|' . self::$title;
    }
}