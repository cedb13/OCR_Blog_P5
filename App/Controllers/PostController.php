<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Model;
use App\Lib\PostService;

class PostController extends Controller{


    public function show(){

    
        $posts['posts'] = $this->postService->getAllPost();
        $contents['post'] = $this->postService->getUserByPost();
        $comments['comments'] = Comment::getCommentByPost();
        $this->setContents($posts);
        $this->setContents($contents);
        $this->setContents($comments);
        $this->render('single');

    }

    public function list(){
        

        $contents['posts'] = $this->postService->getAllPost();
        $this->setContents($contents);
        $this->render('posts');

    }
    
}