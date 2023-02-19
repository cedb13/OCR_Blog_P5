<?php

namespace App\Lib;

use App\Lib\Database as Db;

use App\Models\User;

class UserService{

    private $db;

    public function __construct(){
        $this->db = new Db;
    }

    public function getUserByCredential($mail, $password) {
        $result = $this->db->getPDO()->query("SELECT * FROM user WHERE mail = '$mail' AND password = '$password'");
        $result->execute();
        $result=$result->fetch();
        if($result){
            $user= new User($result['idUser'], $result['last_name'], $result['first_name'], $result['mail']);
            return $user;
        }
        return false;
    }
}