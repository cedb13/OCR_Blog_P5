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
}