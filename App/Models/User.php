<?php

namespace App\Models;

use App\Models\Model as Model;
use App\Lib\Database;

class User extends Model {

    protected static $table = 'user';

    public $idUser;
    public $lastName;
    public $firstName;
    public $email;

    public function __construct($idUser=null, $lastName=null, $firstName=null, $email=null){
        $this->idUser = $idUser;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
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
        $lastName = $this->lastName;
        return $lastName;
    }

    public function getFirstName(){
        $firstName = $this->firstName;
        return $firstName;
    }

    public function __toString(){
        return $this->getLastName() . ' '. $this->getFirstName();
     }


}