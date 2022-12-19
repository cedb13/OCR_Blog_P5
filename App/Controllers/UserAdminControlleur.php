<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;

class UserAdminController extends Controller{

    public function show(){
        $contents['cv']= array ('nom'=>'Bonche', 'prenom'=>'Cedric');
        $this->setContents($contents);
        $this->render('home');
    }
}