<?php

namespace App\Models;


use App\Models\Model as Model;
use App\Lib\Database;

class Post extends Model{

    protected static $table = 'post';

    public $idpost;
    public $title;
    public $caption;
    public $content_post;
    public $last_name;
    public $first_name;
    public $date_last_upload;
    
    //pour récupérer mes derniers posts
    public function __construct($idpost=null, $title=null, $caption=null, $content_post=null, $last_name=null, $first_name=null, $date_last_upload=null){
        $this->idpost = $idpost;
        $this->title = $title;
        $this->caption = $caption;
        $this->content_post = $content_post;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->date_last_upload = $date_last_upload;
    }

    public function getId(){
        return $this->idpost;
    }
    
    public function setId($id){
        $this->idpost = $id;
    }

    
    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }
    
    public function getUrl(){
        return 'index.php?page=post&id=' . $this->idpost;
    }

    public function getCaption(){
        return $this->caption;
    }

    public function setCaption(){
        $this->caption = $caption;
    }

    public function getExcerpt(){
        $excerpt = substr($this->content_post, 0, 250);
        return $excerpt;
    }

    public function getDate(){
        $date = $this->date_last_upload;
        return $date;
    }
}