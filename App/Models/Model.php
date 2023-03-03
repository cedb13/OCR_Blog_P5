<?php
namespace App\Models;

use App\Lib\Database;

class Model{

    protected static $table;
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

    public static function all(){
        return Database::getDb()->query("
            SELECT * 
            FROM " . static::$table . "
            ",  get_called_class());
    }

    public function __get($key) //fonction magic pour trouver un élément, exemple : quand on nomme notre fonction 'getUrl'cela nous évite de reprendre toute la fonction associé à get pour récupérer l'élément "url"...
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}