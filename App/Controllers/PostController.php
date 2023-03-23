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

        if($this->userIsConnected()!== true){
            $comments['comments'] = $this->commentService->getCommentByPost();
        }else{ $comments['comments'] = $this->commentService->getAllCommentByPost();}
        
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

    public function registerComment(){

        $comment = empty($comment);
        //On récupère les données du formulaire
        $idpost         = htmlspecialchars($_POST['idpost']);
        $lastName		= htmlspecialchars(strip_tags($_POST['last_name']));
        $firstName		= htmlspecialchars(strip_tags($_POST['first_name']));
        $email_sanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $email			= filter_var($email_sanitize, FILTER_VALIDATE_EMAIL);
        $title          = htmlspecialchars(strip_tags($_POST['title']));
        $content        = htmlspecialchars(strip_tags($_POST['content_comment']));

        if(isset($_POST)){
             //insertion du résultat
            $comment=$this->commentService->insertComment($lastName, $firstName, $email, $title, $content, $idpost);
        }

        header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&id='.$idpost);
        
    }

    public function adminComment(){
        $adminComment = empty($adminComment);
        $idpost         = htmlspecialchars($_POST['idpost']);
        $idcomment         = htmlspecialchars($_POST['idcomment']);
        $statusSelect		= htmlspecialchars(strip_tags($_POST['statusSelect']));

        if(isset($_POST) && $idpost>0){
            if($statusSelect=='validate'){
                $validate = 1;
                $adminComment=$this->commentService->updateComment($validate, $idcomment);
            }
            elseif($statusSelect=='delete'){
                $adminComment=$this->commentService->deleteComment($idcomment);
            }
        }

        header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&id='.$idpost);
    }

    public function registerPost(){

        $post = empty($post);
        //On récupère les données du formulaire
        $idUser		    = $_SESSION['idUser'];
        $title          = htmlspecialchars(strip_tags($_POST['title']));
        $caption        = htmlspecialchars(strip_tags($_POST['caption']));
        $contentPost    = htmlspecialchars(strip_tags($_POST['content_post']));



        if(isset($_POST)){
             //insertion du résultat
            $post=$this->postService->insertPost($idUser, $title, $caption, $contentPost);
        }

        header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&action=list');
        
    }

    public function adminPost(){
        $adminPostComment = empty($adminPostComment);
        $adminPost        = empty($adminPost);
        $idpost           = htmlspecialchars($_POST['idpost']);
        $statusSelect	  = htmlspecialchars(strip_tags($_POST['statusSelect']));

        if(isset($_POST) && $idpost>0){
            if($statusSelect=='update'){
                header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&id='.$idpost);
            }
            elseif($statusSelect=='delete'){
                $adminPostComment=$this->commentService->deleteAllCommentsByPost($idpost);
                $adminPost=$this->postService->deletePost($idpost);
                header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&action=list');
            }
        }
        echo '<pre>';
        var_dump($idpost);
        echo '<pre>';
        die;
    }

    public function adminUpdatePost(){
        $adminPost      = empty($adminPost);
        $idUser		    = $_SESSION['idUser'];
        $idpost         = htmlspecialchars($_POST['idpost']);
        $title          = htmlspecialchars(strip_tags($_POST['title']));
        $caption        = htmlspecialchars(strip_tags($_POST['caption']));
        $contentPost    = htmlspecialchars(strip_tags($_POST['content_post']));

        if(isset($_POST) && $idpost>0){
            $adminPost=$this->postService->updatePost($idUser, $title, $caption, $contentPost, $idpost);
        }

        header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&id='.$idpost);
    }
    
}