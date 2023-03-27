<?php

namespace App\Lib;

use App\Lib\Database as Db;

use App\Models\Post;

class PostService{

    private $db;

    public function __construct(){
        $this->db = new Db;
    }

    //pour récupérer mes derniers posts
    public function getAllPost(){
        $results = [];
        $query = $this->db->getPDO()->query('SELECT * FROM post');
        $query->execute();
        $query=$query->fetchall();
        foreach($query as $data){
            $post= new Post($data['idpost'], $data['title'], $data['caption'], $data['content_post'], null, null, $data['date_last_upload']);
            array_push($results, $post);
        }
        return $results;
    }

   //pour récupérer un post, le nom et prénom de l'auteur du post
   /* on fait d'abord un 'preprare' de la requête sql pour éviter les injections */
   public function getUserByPost(){
        $id= $_GET['id'];
        $results = [];
        $query = $this->db->getPDO()->prepare("SELECT idpost, title, caption, content_post, last_name, first_name, date_last_upload, idUser 
        FROM post 
        LEFT JOIN user 
            ON idUser = user_idUser
            WHERE idpost = '$id'");
        $query->execute();
        $query=$query->fetchall();
        foreach($query as $data){
            $post= new Post($data['idpost'], $data['title'], $data['caption'], $data['content_post'], $data['last_name'], $data['first_name'], $data['date_last_upload']);
            array_push($results, $post);
        }
        return $results;
   }

   public function insertPost($idUser, $title, $caption, $contentPost){

    $query = "INSERT INTO post (user_idUser, title, caption, content_post, date_last_upload) VALUES ('$idUser', '$title', '$caption', '$contentPost', '".date('Y-m-d')."' )";
    $sth = $this->db->getPDO()->prepare($query);
    $sth->execute();
    }

    public function updatePost($idUser, $title, $caption, $contentPost, $idpost){
        
        $query = "UPDATE post  SET user_idUser='$idUser', title='$title', caption='$caption', content_post='$contentPost', date_last_upload=DATE( NOW() )  WHERE idpost='$idpost' ";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
    }

    public function deletePost($idpost){
        $query = "DELETE FROM post WHERE idpost='$idpost'";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
    }
}