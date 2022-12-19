<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;

class HomeController extends Controller{

   /*public function __construct(){
        parent::__construct();
        $this->loadModel('Home');
    }*/

    public function show(){
        $contents['cv']= array ('nom'=>'Bonche', 'prenom'=>'Cedric');
        $this->setContents($contents);
        $this->render('home');
    }
}