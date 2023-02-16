<?php

namespace App\Models;

use App\Models\Model as Model;
use App\Lib\Database;

class User extends Model {

    protected static $table = 'user';

    public $id;
    public $last_name;
    public $first_name;
    public $mail;

    //pour récupérer mes derniers posts
    public function __construct($id=null, $last_name=null, $first_name=null, $mail=null){
        $this->id = $id;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->mail = $mail;
    }

    public function getId(){
        return $this->id;
    }

    public function getMail(){
        return $this->mail;
    }

    public function setMail($mail){
        $this->mail=$mail;
    }

}