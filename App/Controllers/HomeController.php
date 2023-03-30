<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Models\Post;
use App\Models\Model;
use App\Models\User;
use App\Lib\UserService;
use App\Lib\PostService;

class HomeController extends Controller{

<<<<<<< HEAD

=======
>>>>>>> Feature-issue-6-single_post
    public function show(){
    
        $posts['posts'] = $this->postService->getAllPost();
        $contents['cv']= array ('nom'=>'Bonche', 'prenom'=>'Cédric');
        $this->setContents($posts);
        $this->setContents($contents);
        $this->render('home');
        
    }


    public function notFound(){
        $this->render('notFound');
    }
}