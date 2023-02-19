<?php

namespace App\Models;


use App\Models\Model as Model;
use App\Lib\Database;

class Comment extends Model{

    protected static $table = 'comment';

    public $idcomment; 
    public $title; 
    public $content_comment; 
    public $last_name; 
    public $first_name; 
    public $date_publication; 
    public $post_idpost;
    public $validate; 
    
    //pour récupérer mes derniers posts
    public function __construct($idcomment=null, $title=null, $content_comment=null, $last_name=null, $first_name=null, $date_publication=null, $post_idpost=null, $validate=null){
        $this->idcomment = $idcomment;  
        $this->title = $title;  
        $this->content_comment = $content_comment;  
        $this->last_name = $last_name;  
        $this->first_name = $first_name; 
        $this->date_publication = $date_publication;  
        $this->post_idpost = $post_idpost;
        $this->validate = $validate; 
    }

    public function getId(){
        return $this->idcomment;
    }
    
    public function setId($id){
        $this->idcomment = $id;
    }

    public function getIdpost(){
        return $this->post_idpost;
    }
    
    public function setIdpost($post_idpost){
        $this->post_idpost = $post_idpost;
    }

    
    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }
    
    public function getContent(){
        return $this->content_comment;
    }

    public function setContent($content){
        $this->content_comment=$content;
    }

    public function getDate(){
        $date = $this->date_publication;
        return $date;
    }
}