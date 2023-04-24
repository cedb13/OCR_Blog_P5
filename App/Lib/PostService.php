<?php

namespace App\Lib;

use App\Lib\Database as Db;

use App\Models\Post;

class PostService{

    private $db;

    public function __construct(){
        $this->db = new Db;
    }

    //to get all posts
    public function getAllPost(){
        $results = [];
        $query = $this->db->getPDO()->query("SELECT idPost, title, caption, contentPost, dateLastUpload FROM post ORDER BY dateLastUpload DESC");
        $query->execute();
        $query=$query->fetchall();
        foreach($query as $data){
            $post= new Post($data['idPost'], $data['title'], $data['caption'], $data['contentPost'], null, null, $data['dateLastUpload']);
            array_push($results, $post);
        }
        return $results;
    }

    //to get 5 last posts
    public function getLastPost(){
        $results = [];
        $query = $this->db->getPDO()->query('SELECT * FROM post ORDER BY dateLastUpload DESC LIMIT 5');
        $query->execute();
        $query=$query->fetchall();
        foreach($query as $data){
            $post= new Post($data['idPost'], $data['title'], $data['caption'], $data['contentPost'], null, null, $data['dateLastUpload']);
            array_push($results, $post);
        }
        return $results;
    }

   //to get one post, the last name and the first name post author
   /* we first make a 'preprare'of the sql request to avoid injections */
   public function getUserByPost(){
        $id= $_GET['id'];
        $results = [];
        $query = $this->db->getPDO()->prepare("SELECT idPost, title, caption, contentPost, lastName, firstName, dateLastUpload, idUser 
        FROM post 
        INNER JOIN user 
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

   /**
     * insert to the post database
     *
     * @param int $idUser  
     * @param string $title
     * @param string $caption 
     * @param string $contentPost
     */
   public function insertPost($idUser, $title, $caption, $contentPost){

    $query = "INSERT INTO post (user_idUser, title, caption, contentPost, dateLastUpload) VALUES ('$idUser', '$title', '$caption', '$contentPost', '".date('Y-m-d')."' )";
    $sth = $this->db->getPDO()->prepare($query);
    $sth->execute();
    }

    /**
     * update post database
     * 
     * @param int $idUser  
     * @param string $title
     * @param string $caption 
     * @param string $contentPost
     * @param int $idPost
     * 
     */
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