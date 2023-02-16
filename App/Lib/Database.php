<?php
namespace App\Lib;

use \PDO;

class Database{

    private $dbName;
    private $dbUser;
    private $dbPass;
    private $dbHost;
    private $pdo;
    private static $database;

    public function __construct($dbName = 'blog_pro_p5', $dbUser = 'root', $dbPass ='#@root@#', $dbHost = 'localhost'){
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->dbHost = $dbHost;
        $this->pdo = new PDO('mysql:dbname=blog_pro_p5;host=localhost', 'root', '#@root@#');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPDO(){
        return $this->pdo;
    }

   /*public function query($statement, $class_name, $one = false){
        $req = $this->getPDO()->query($statement);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one){
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function prepare($statement, $attributes, $class_name, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one){
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public static function getDb(){
        if( self::$database === null){
            self::$database = new Database($dbName = 'blog_pro_p5', $dbUser = 'root', $dbPass ='#@root@#', $dbHost = 'localhost');
        }
        return self::$database;

    }*/
  
}
