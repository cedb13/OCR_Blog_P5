<?php

namespace App\Lib;

use App\Lib\Database as Db;

class SendMailService{

    private $db;

    public function __construct(){
        $this->db = new Db;
    }
}