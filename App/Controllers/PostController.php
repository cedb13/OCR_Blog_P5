<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Model;
use App\Lib\PostService;
use App\Lib\CommentService;

class PostController extends Controller{


    public function show(){

    
        $comments['comments'] = $this->commentService->getCommentByPost();
        $posts['posts'] = $this->postService->getAllPost();
        $contents['post'] = $this->postService->getUserByPost();
        $this->setContents($comments);
        $this->setContents($posts);
        $this->setContents($contents);
        $this->render('single');

    }

    public function list(){
        

        $contents['posts'] = $this->postService->getAllPost();
        $this->setContents($contents);
        $this->render('posts');
    }
    
}