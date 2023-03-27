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
   /* on fait d'abord un 'preprare' de la requête sql pour éviter les injections */
   public function getCommentValidateByPost(){
        $id= $_GET['id'];
        $results = [];
        $query = $this->db->getPDO()->prepare("SELECT idcomment, comment.title, content_comment, comment.last_name, comment.first_name, date_publication, post_idpost, validate, post.idpost 
        FROM comment 
        LEFT JOIN post
            ON idpost = post_idpost
            WHERE validate = 1 AND post_idpost = '$id'");
        $query->execute();
        $query=$query->fetchall();
        foreach($query as $data){
            $comment= new Comment($data['idcomment'], $data['title'], $data['content_comment'], $data['last_name'], $data['first_name'], $data['date_publication'], $data['post_idpost'], $data['validate']);
            array_push($results, $comment);
        }
        return $results;
   }

   public function getAllCommentByPost(){
        $id= $_GET['id'];
        $results = [];
        $query = $this->db->getPDO()->prepare("SELECT idcomment, comment.title, content_comment, comment.last_name, comment.first_name, date_publication, post_idpost, validate, post.idpost 
        FROM comment 
        LEFT JOIN post
            ON idpost = post_idpost
            WHERE post_idpost = '$id'");
        $query->execute();
        $query=$query->fetchall();
        foreach($query as $data){
            $comment= new Comment($data['idcomment'], $data['title'], $data['content_comment'], $data['last_name'], $data['first_name'], $data['date_publication'], $data['post_idpost'], $data['validate']);
            array_push($results, $comment);
        }
        return $results;
   }


   public function insertComment($lastName, $firstName, $email, $title, $content, $idpost){

        $query = "INSERT INTO comment (last_name, first_name, email, title, content_comment, date_publication, post_idpost, validate) VALUES ('$lastName','$firstName','$email','$title','$content', '".date('Y-m-d')."', '$idpost', 0 )";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
   }

   public function updateComment($validate, $idcomment){
         $query = "UPDATE comment  SET validate='$validate' WHERE idcomment='$idcomment' ";
         $sth = $this->db->getPDO()->prepare($query);
         $sth->execute();
    }

    public function deleteComment($idcomment){
        $query = "DELETE FROM comment WHERE idcomment='$idcomment'";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
    }

    public function deleteAllCommentsByPost($idpost){
        $query = "DELETE FROM comment WHERE post_idpost = '$idpost'";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
    }

}