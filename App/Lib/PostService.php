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
            $post= new Post($data['idPost'], $data['title'], $data['caption'], $data['contentPost'], null, null, $data['dateLastUpload']);
            array_push($results, $post);
        }
        return $results;
    }

   //pour récupérer un post, le nom et prénom de l'auteur du post
   /* on fait d'abord un 'preprare' de la requête sql pour éviter les injections */
   public function getUserByPost(){
        $id= $_GET['id'];
        $results = [];
        $query = $this->db->getPDO()->prepare("SELECT idPost, title, caption, contentPost, lastName, firstName, dateLastUpload, idUser 
        FROM post 
        LEFT JOIN user 
            ON idUser = user_idUser
            WHERE idPost = '$id'");
        $query->execute();
        $query=$query->fetchall();
        foreach($query as $data){
            $post= new Post($data['idPost'], $data['title'], $data['caption'], $data['contentPost'], $data['lastName'], $data['firstName'], $data['dateLastUpload']);
            array_push($results, $post);
        }
        return $results;
   }

   public function insertPost($idUser, $title, $caption, $contentPost){

    $query = "INSERT INTO post (user_idUser, title, caption, contentPost, dateLastUpload) VALUES ('$idUser', '$title', '$caption', '$contentPost', '".date('Y-m-d')."' )";
    $sth = $this->db->getPDO()->prepare($query);
    $sth->execute();
    }

    public function updatePost($idUser, $title, $caption, $contentPost, $idPost){
        
        $query = "UPDATE post  SET user_idUser='$idUser', title='$title', caption='$caption', contentPost='$contentPost', dateLastUpload=DATE( NOW() )  WHERE idPost='$idPost' ";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
    }

    public function deletePost($idPost){
        $query = "DELETE FROM post WHERE idPost='$idPost'";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
    }
}