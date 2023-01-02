<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Model\Post;

class PostsController extends Controller{

    public function show(){

        $contents['posts'] = Post::getLast();
        $this->setContents($contents);
        $this->render('posts');
    

    }
}