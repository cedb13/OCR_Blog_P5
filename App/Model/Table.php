<?php
namespace App\Model;

use App\Lib\App;

class Table{

    protected static $table;

    private static function getTable(){
        if(static::$table === null){
            $class_name = explode('\\', get_called_class());
            static::$table =strtolower(end($class_name)) . 's';
        }
        return static::$table;
    }

    public static function find($id){
        return  App::getDb()->prepare("
        SELECT * 
        FROM " . static::$table . "
        WHERE id = ?
        ", [$id], get_called_class(), true);
    }

    public static function query($statement, $attributes = null, $one = false){
        if($attributes){
            return App::getDb()->prepare($statement, $attributes, get_called_class(), $one);
        } else {
            return App::getDb()->query($statement, get_called_class(), $one);
        }
    }

    public static function all(){
        return App::getDb()->query("
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