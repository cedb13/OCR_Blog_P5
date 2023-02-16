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
        return $this->db->getPDO()->query('SELECT * FROM post');

    }

   //pour récupérer un post, le nom et prénom de l'auteur du post
   /* on fait d'abord un 'preprare' de la requête sql pour éviter les injections */
   public function getUserByPost(){
    $id= $_GET['id'];
    return $this->db->getPDO()->prepare('SELECT idpost, title, caption, content_post, last_name, first_name, date_last_upload, idUser 
    FROM post 
    LEFT JOIN user 
        ON idUser = user_idUser 
        WHERE idpost = ?', [$id]);
   }
}