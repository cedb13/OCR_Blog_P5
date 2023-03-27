<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Model;
use App\Lib\PostService;
use App\Lib\CommentService;
use App\Lib\userService;

class PostController extends Controller{


    public function show(){

        if($this->userIsConnected()!== true){
            $comments['comments'] = $this->commentService->getCommentValidateByPost();
        }
        else{ 
            $comments['comments'] = $this->commentService->getAllCommentByPost();
        }
        
        $posts['posts'] = $this->postService->getAllPost();
        $contents['post'] = $this->postService->getUserByPost();
        $users['users'] = $this->userService->getAllUser();
        $this->setContents($users);
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

        if(isset($_POST)){
            $comment = empty($comment);
            //On récupère les données du formulaire
            $idpost         = htmlspecialchars($_POST['idpost']);
            $lastName		= htmlspecialchars(strip_tags($_POST['last_name']));
            $firstName		= htmlspecialchars(strip_tags($_POST['first_name']));
            $email_sanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email			= filter_var($email_sanitize, FILTER_VALIDATE_EMAIL);
            $title          = htmlspecialchars(strip_tags($_POST['title']));
            $content        = htmlspecialchars(strip_tags($_POST['content_comment']));

            if($idpost>0){
                //insertion du résultat
                $comment=$this->commentService->insertComment($lastName, $firstName, $email, $title, $content, $idpost);
            }

            header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&id='.$idpost);
        }

    }

    public function adminComment(){
        if(isset($_POST)){
            $adminComment = empty($adminComment);
            $idpost       = htmlspecialchars($_POST['idpost']);
            $idcomment    = htmlspecialchars($_POST['idcomment']);
            $statusSelect = htmlspecialchars(strip_tags($_POST['statusSelect']));

            if($idpost>0){
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
        
    }

    public function registerPost(){

        if(isset($_POST)){

            $post = empty($post);
            //On récupère les données du formulaire
            $idUser		    = $_SESSION['idUser'];
            $title          = htmlspecialchars(strip_tags($_POST['title']));
            $caption        = htmlspecialchars(strip_tags($_POST['caption']));
            $contentPost    = htmlspecialchars(strip_tags($_POST['content_post']));
            
            if($idUser>0){
                //insertion du résultat
                $post=$this->postService->insertPost($idUser, $title, $caption, $contentPost);
            }

            header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&action=list');
        }
        
    }

    public function adminPost(){
        if(isset($_POST)){

            $adminPostComment = empty($adminPostComment);
            $adminPost        = empty($adminPost);
            $idpost           = htmlspecialchars($_POST['idpost']);
            $statusSelect	  = htmlspecialchars(strip_tags($_POST['statusSelect']));
    
            if($idpost>0){
                if($statusSelect=='update'){
                    header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&id='.$idpost);
                }
                elseif($statusSelect=='delete'){
                    $adminPostComment=$this->commentService->deleteAllCommentsByPost($idpost);
                    $adminPost=$this->postService->deletePost($idpost);
                    header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&action=list');
                }
            }

        }

    }

    public function adminUpdatePost(){
        
        if(isset($_POST)){
            $adminPost      = empty($adminPost);
            $idpost         = htmlspecialchars($_POST['idpost']);
            $title          = htmlspecialchars(strip_tags($_POST['title']));
            $caption        = htmlspecialchars(strip_tags($_POST['caption']));
            $contentPost    = htmlspecialchars(strip_tags($_POST['content_post']));
            $authorSelect	= htmlspecialchars(strip_tags($_POST['authorSelect']));
            $idUser         = $_SESSION['idUser'];
    
            if(!empty($authorSelect)){
                $idUser = $authorSelect;
            }
                
            $adminPost=$this->postService->updatePost($idUser, $title, $caption, $contentPost, $idpost);

        }
                    
        header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=post&id='.$idpost);
    }

}