<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Models\Model;

class UserAdminController extends Controller{

    public function show(){

        $message['message'] = Model::getMessage();
        $deconnect['deconnect'] = Model::deconnect();
        $this->setContents($deconnect);
        $this->setContents($message);
        $this->login();
        $this->render('default');

    }
}