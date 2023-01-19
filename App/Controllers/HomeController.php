<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Model\UserAdmin;
use App\Model\Post;

class HomeController extends Controller{

    public function show(){
        
        $posts['posts'] = Post::getLast();
        $contents['cv']= array ('nom'=>'Bonche', 'prenom'=>'Cédric');
        $log['log'] = UserAdmin::login();
        $message['message'] = UserAdmin::logMessage();
        $this->setContents($posts);
        $this->setContents($contents);
        $this->setContents($log);
        $this->setContents($message);
        $this->render('home');
    }
}