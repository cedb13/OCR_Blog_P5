<?php
namespace App\Lib;

use \PDO;

class Database{

    private $dbName;
    private $dbUser;
    private $dbPass;
    private $dbHost;
    private $pdo;

    // Access attributes to the database 
    public function __construct($dbName = DB_NAME , $dbUser= DB_USER, $dbPass= DB_PASS , $dbHost= DB_HOST){
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->dbHost = $dbHost;
        $this->pdo = new PDO("mysql:dbname={$dbName};host={$dbHost}", $dbUser, $dbPass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

    }

    public function getPDO(){
        return $this->pdo;
    }
}