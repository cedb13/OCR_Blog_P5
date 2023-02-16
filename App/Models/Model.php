<?php
namespace App\Models;

use App\Lib\Database;

class Model{

    protected static $table;
    protected static $title = 'Mon CV en ligne';
    protected static $_instance;

    public static function getinstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Model();
        }
        return self::$_instance;
    }

    private static function getTable(){
        if(static::$table === null){
            $class_name = explode('\\', get_called_class());
            static::$table =strtolower(end($class_name));
        }
        return static::$table;
    }

    public static function find($id){
        return  Database::getDb()->prepare("
        SELECT * 
        FROM " . static::$table . "
        WHERE id = ?
        ", [$id], get_called_class(), true);
    }

    public static function query($statement, $attributes = null, $one = false){
        if($attributes){
            return Database::getDb()->prepare($statement, $attributes, get_called_class(), $one);
        } else {
            return Database::getDb()->query($statement, get_called_class(), $one);
        }
    }

    public static function all(){
        return Database::getDb()->query("
            SELECT * 
            FROM " . static::$table . "
            ",  get_called_class());
    }

    public function __get($key) //fonction magic pour trouver un élément, dans notre cas par exple cela sert à récupérer 'url', 'getUrl'...
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    /*public static function notFound(){
        header("HTTP/1.0 404 Not Found");
        header('Location:index.php?page=404');
    }*/

    public static function getTitle(){
        return self::$title;
    }

    public static function setTitle($title){
        self::$title = $title . '|' . self::$title;
    }

}