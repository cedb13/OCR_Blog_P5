<?php

namespace App\Models;


use App\Models\Model as Model;
use App\Lib\Database;

class Comment extends Model{

    protected static $table = 'comment';

    public $idComment; 
    public $title; 
    public $contentComment; 
    public $lastName; 
    public $firstName; 
    public $datePublication; 
    public $post_idPost;
    public $validate; 
    
    //pour récupérer mes derniers posts
    public function __construct($idComment=null, $title=null, $contentComment=null, $lastName=null, $firstName=null, $datePublication=null, $post_idPost=null, $validate=null){
        $this->idComment = $idComment;  
        $this->title = $title;  
        $this->contentComment = $contentComment;  
        $this->lastName = $lastName;  
        $this->firstName = $firstName; 
        $this->datePublication = $datePublication;  
        $this->post_idPost = $post_idPost;
        $this->validate = $validate; 
    }

    public function getId(){
        return $this->idComment;
    }
    
    public function setId($id){
        $this->idComment = $id;
    }

    public function getIdpost(){
        return $this->post_idPost;
    }
    
    public function setIdpost($post_idPost){
        $this->post_idPost = $post_idPost;
    }

    
    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }
    
    public function getContent(){
        return $this->contentComment;
    }

    public function setContent($content){
        $this->contentComment=$content;
    }

    public function getDate(){
        $date = $this->datePublication;
        return $date;
    }
}