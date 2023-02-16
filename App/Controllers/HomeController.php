<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Models\Post;
use App\Models\Model;
use App\Models\User;
use App\Lib\UserService;
use App\Lib\PostService;

class HomeController extends Controller{

    public function show(){

        
        $contents['cv']= array ('nom'=>'Bonche', 'prenom'=>'Cédric');
        $this->setContents($contents);
        $this->render('home');
    }


    public function notFound(){
        $this->render('notFound');
    }
}