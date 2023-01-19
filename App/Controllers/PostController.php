<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Model\Post;
use App\Model\Comment;

class PostController extends Controller{


    public function show(){
    
        $posts['posts'] = Post::getLast();
        $contents['post'] = Post::getOne();
        $comments['comments'] = Comment::getLastComment();
        $this->setContents($posts);
        $this->setContents($contents);
        $this->setContents($comments);
        $this->render('single');

    }
    
}