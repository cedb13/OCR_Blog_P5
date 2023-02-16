<?php

namespace App\Models;

use App\Models\Model as Model;
use App\Lib\Database;

class User extends Model {

    protected static $table = 'user';

    public $idUser;
    public $last_name;
    public $first_name;
    public $mail;

    public function __construct($idUser=null, $last_name=null, $first_name=null, $mail=null){
        $this->idUser = $idUser;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->mail = $mail;
    }

    public function getId(){
        return $this->idUser;
    }

    public function setId($id){
        $this->idUser = $id;
    }

    public function getMail(){
        return $this->mail;
    }

    public function setMail($mail){
        $this->mail=$mail;
    }

    public function getLastName(){
        $lastName = $this->last_name;
        return $lastName;
    }

    public function getFirstName(){
        $firstName = $this->first_name;
        return $firstName;
    }


}