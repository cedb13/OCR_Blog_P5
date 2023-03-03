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
   public function getCommentByPost(){
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

}