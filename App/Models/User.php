<?php

namespace App\Models;

use App\Models\Model as Model;
use App\Lib\Database;

class User extends Model {

    protected static $table = 'user';

    public $idUser;
    public $last_name;
    public $first_name;
    public $email;

    public function __construct($idUser=null, $last_name=null, $first_name=null, $email=null){
        $this->idUser = $idUser;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->email = $email;
    }

    public function getIdUser(){
        return $this->idUser;
    }

    public function setIdUser($idUser){
        $this->idUser = $idUser;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function getLastName(){
        $last_name = $this->last_name;
        return $last_name;
    }

    public function getFirstName(){
        $first_name = $this->first_name;
        return $first_name;
    }

    public function __toString(){
        return $this->getLastName() . ' '. $this->getFirstName();
     }


}