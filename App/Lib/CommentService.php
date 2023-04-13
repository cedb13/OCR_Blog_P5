<?php

namespace App\Lib;

use App\Lib\Database as Db;
use App\Models\Comment;

class CommentService{

    private $db;

    public function __construct(){
        $this->db = new Db;
    }


   //pour récupérer les commentaires par post, les noms et prénoms de chaque auteur de chaque commentaire
   /* on fait un 'preprare' de la requête sql pour éviter les injections */
   public function getCommentValidateByPost(){
        $id= $_GET['id'];
        $results = [];
        $query = $this->db->getPDO()->prepare("SELECT idComment, comment.title, contentComment, comment.lastName, comment.firstName, datePublication, post_idPost, validate, post.idPost 
        FROM comment 
        LEFT JOIN post
            ON idPost = post_idPost
            WHERE validate = 1 AND post_idPost = '$id'");
        $query->execute();
        $query=$query->fetchall();
        foreach($query as $data){
            $comment= new Comment($data['idComment'], $data['title'], $data['contentComment'], $data['lastName'], $data['firstName'], $data['datePublication'], $data['post_idPost'], $data['validate']);
            array_push($results, $comment);
        }
        return $results;
   }

   public function getAllCommentByPost(){
        $id= $_GET['id'];
        $results = [];
        $query = $this->db->getPDO()->prepare("SELECT idComment, comment.title, contentComment, comment.lastName, comment.firstName, datePublication, post_idPost, validate, post.idPost 
        FROM comment 
        LEFT JOIN post
            ON idPost = post_idPost
            WHERE post_idPost = '$id'");
        $query->execute();
        $query=$query->fetchall();
        foreach($query as $data){
            $comment= new Comment($data['idComment'], $data['title'], $data['contentComment'], $data['lastName'], $data['firstName'], $data['datePublication'], $data['post_idPost'], $data['validate']);
            array_push($results, $comment);
        }
        return $results;
   }


   public function insertComment($lastName, $firstName, $email, $title, $content, $idPost){

        $query = "INSERT INTO comment (lastName, firstName, email, title, contentComment, datePublication, post_idPost, validate) VALUES ('$lastName','$firstName','$email','$title','$content', '".date('Y-m-d')."', '$idPost', 0 )";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
   }

   public function updateComment($validate, $idComment){
         $query = "UPDATE comment  SET validate='$validate' WHERE idComment='$idComment' ";
         $sth = $this->db->getPDO()->prepare($query);
         $sth->execute();
    }

    public function deleteComment($idComment){
        $query = "DELETE FROM comment WHERE idComment='$idComment'";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
    }

    public function deleteAllCommentsByPost($idPost){
        $query = "DELETE FROM comment WHERE post_idPost = '$idPost'";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
    }

}