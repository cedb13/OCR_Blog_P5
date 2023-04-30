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
        $lastPosts['lastPosts'] = $this->postService->getLastPost();
        $contents['post'] = $this->postService->getUserByPost();
        $users['users'] = $this->userService->getAllUser();
        $this->setContents($users);
        $this->setContents($comments);
        $this->setContents($posts);
        $this->setContents($lastPosts);
        $this->setContents($contents);
        $this->render('single');

    }

    public function list(){

        $contents['posts'] = $this->postService->getAllPost();
        $lastPosts['lastPosts'] = $this->postService->getLastPost();
        $this->setContents($contents);
        $this->setContents($lastPosts);
        $this->render('posts');
    }

    public function registerComment(){

        if(isset($_POST)){
            $comment = empty($comment);
            //On récupère les données du formulaire
            $idPost         = htmlspecialchars($_POST['idPost']);
            $lastName		= htmlspecialchars(strip_tags(str_replace("'", "\'", $_POST['lastName'])));
            $firstName		= htmlspecialchars(strip_tags(str_replace("'", "\'", $_POST['firstName'])));
            $emailSanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email			= filter_var($emailSanitize, FILTER_VALIDATE_EMAIL);
            $title          = htmlspecialchars(strip_tags(str_replace("'", "\'", $_POST['title'])));
            $content        = htmlspecialchars(strip_tags(str_replace("'", "\'", $_POST['contentComment'])));

            if($idPost>0){
                //insertion du résultat
                $comment=$this->commentService->insertComment($lastName, $firstName, $email, $title, $content, $idPost);
            }

            header('Location:/OCR_Blog_P5/public/index.php?page=post&id='.$idPost);
        }

    }

    public function adminComment(){
        if(isset($_POST)){
            $adminComment = empty($adminComment);
            $idPost       = htmlspecialchars($_POST['idPost']);
            $idComment    = htmlspecialchars($_POST['idComment']);
            $statusSelect = htmlspecialchars($_POST['statusSelect']);

            if($idPost>0){
                if($statusSelect=='validate'){
                    $validate = 1;
                    $adminComment=$this->commentService->updateComment($validate, $idComment);
                }
                elseif($statusSelect=='delete'){
                    $adminComment=$this->commentService->deleteComment($idComment);
                }
            }

            header('Location:/OCR_Blog_P5/public/index.php?page=post&id='.$idPost);
        }
        
    }

    public function registerPost(){

        if(isset($_POST)){

            $post = empty($post);
            //On récupère les données du formulaire
            $idUser		    = $_SESSION['idUser'];
            $title          = htmlspecialchars(strip_tags(str_replace("'", "\'", $_POST['title'])));
            $caption        = htmlspecialchars(strip_tags(str_replace("'", "\'", $_POST['caption'])));
            $contentPost    = htmlspecialchars(strip_tags(str_replace("'", "\'",$_POST['contentPost'])));
            
            if($idUser>0){
                //insertion du résultat
                $post=$this->postService->insertPost($idUser, $title, $caption, $contentPost);
            }

            header('Location:/OCR_Blog_P5/public/index.php?page=post&action=list');
        }
        
    }

    public function adminPost(){
        if(isset($_POST)){

            $adminPostComment = empty($adminPostComment);
            $adminPost        = empty($adminPost);
            $idPost           = htmlspecialchars($_POST['idPost']);
            $statusSelect     = htmlspecialchars($_POST['statusSelect']);
    
            if($idPost>0){
                if($statusSelect=='update'){
                    header('Location:/OCR_Blog_P5/public/index.php?page=post&id='.$idPost.'/#update');
                }
                elseif($statusSelect=='delete'){
                    $adminPostComment=$this->commentService->deleteAllCommentsByPost($idPost);
                    $adminPost=$this->postService->deletePost($idPost);
                    header('Location:/OCR_Blog_P5/public/index.php?page=post&action=list');
                }
            }

        }

    }

    public function adminUpdatePost(){
        
        if(isset($_POST)){
            $adminPost      = empty($adminPost);
            $idPost         = htmlspecialchars($_POST['idPost']);
            $title          = htmlspecialchars(strip_tags(str_replace("'", "\'", $_POST['title'])));
            $caption        = htmlspecialchars(strip_tags(str_replace("'", "\'", $_POST['caption'])));
            $contentPost    = htmlspecialchars(strip_tags(str_replace("'", "\'",$_POST['contentPost'])));
            $authorSelect	= htmlspecialchars(strip_tags($_POST['authorSelect']));
            $idUser         = $_SESSION['idUser'];
    
            if(!empty($authorSelect)){
                $idUser = $authorSelect;
            }
                
            $adminPost=$this->postService->updatePost($idUser, $title, $caption, $contentPost, $idPost);

        }
                    
        header('Location:/OCR_Blog_P5/public/index.php?page=post&id='.$idPost);
    }

}