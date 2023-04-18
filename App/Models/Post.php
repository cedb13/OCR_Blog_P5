<?php

namespace App\Models;


use App\Models\Model as Model;
use App\Lib\Database;

class Post extends Model{

    protected static $table = 'post';

    public $idPost;
    public $title;
    public $caption;
    public $contentPost;
    public $lastName;
    public $firstName;
    public $dateLastUpload;
    
    //for any initialization that the Post object may need before it is used
    public function __construct($idPost=null, $title=null, $caption=null, $contentPost=null, $lastName=null, $firstName=null, $dateLastUpload=null){
        $this->idPost = $idPost;
        $this->title = $title;
        $this->caption = $caption;
        $this->contentPost = $contentPost;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->dateLastUpload = $dateLastUpload;
    }

    public function getId(){
        return $this->idPost;
    }
    
    public function setId($id){
        $this->idPost = $id;
    }

    
    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }
    
    public function getUrl(){
        return 'index.php?page=post&id=' . $this->idPost;
    }

    public function getCaption(){
        return $this->caption;
    }

    public function setCaption(){
        $this->caption = $caption;
    }

    public function getExcerpt(){
        $excerpt = substr($this->contentPost, 0, 252);
        return $excerpt;
    }

    public function getDate(){
        $date = $this->dateLastUpload;
        return $date;
    }
}