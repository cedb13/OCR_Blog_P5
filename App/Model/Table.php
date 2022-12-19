<?php
namespace App\Model;

<<<<<<< HEAD
=======
use App\Lib\App;
>>>>>>> Feature-issue-4-homepage

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

    public function __get($key) //fonction magic pour trouver un élément, dans notre cas par exple cela sert à récupérer 'url', 'getUrl'...
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}