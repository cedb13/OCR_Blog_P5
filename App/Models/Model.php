<?php
namespace App\Models;

use App\Lib\Database as Db ;

class Model{

    protected static $table;
    protected static $_instance;
    private $db;

    public function __construct(){
        $this->db = new Db;
    }

    public static function getinstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Model();
        }
        return self::$_instance;
    }

    private static function getTable(){
        if(static::$table === null){
            $className = explode('\\', get_called_class());
            static::$table =strtolower(end($className));
        }
        return static::$table;
    }

    public static function find($id){
        return  Database::$db->getPDO()->prepare("
        SELECT * 
        FROM " . static::$table . "
        WHERE id = ?
        ", [$id], get_called_class(), true);
    }

    public static function all(){
        return Database::$db->getPDO()->query("
            SELECT * 
            FROM " . static::$table . "
            ",  get_called_class());
    }

    public function __get($key){
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}