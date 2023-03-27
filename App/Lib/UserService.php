<?php

namespace App\Lib;

use App\Lib\Database as Db;

use App\Models\User;

class UserService{

    private $db;
    public const PASSWORD_MIN_LEN = '8';
    public const USER_MIN_KEY = ['last_name','first_name', 'email', 'password'];

    public function __construct(){
        $this->db = new Db;
    }

    public function getInfoUser(){

        if(isset($_SESSION['user'])){
            $idUser= $_SESSION['user']->idUser;
            $results = [];
            $query = $this->db->getPDO()->prepare("SELECT idUser, last_name, first_name, email FROM user WHERE idUser='$idUser'");
            $query->execute();
            $query=$query->fetchall();
            foreach($query as $data){
                $user= new User($data['idUser'], $data['last_name'], $data['first_name'], $data['email']);
                array_push($results, $user);
            }
            return $results;
        }
       
   }

    public function getUserByCredential($email, $password){
        $user=[];
        $result = $this->db->getPDO()->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");
        $result->execute();
        $result=$result->fetch();
        if($result){
            $user= new User($result['idUser'], $result['last_name'], $result['first_name'], $result['email']);

        }

        return $user;
    }

    /**
     * to check if the username already exists
     *
     * @param string $username
     * @return boolean
     */
    public function isUsernameExists($lastName, $firstName){

        $query = $this->db->getPDO()->query("SELECT * FROM user WHERE last_name = '$lastName' AND first_name = '$firstName'");
        $query->execute();
        $query=$query->fetch();
        if($query){
            $username = array($lastName, $firstName);
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to check if the email already exists
     *
     * @param string $email
     * @return boolean
     */
    public function isEmailExists($email){
        $query = $this->db->getPDO()->query("SELECT * FROM user WHERE email = '$email'");
        $query->execute();
        $query=$query->fetch();
        if($query){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
        

    /**
     * insert database user
     *
     * @param string $lastName  
     * @param string $firstName
     * @param string $email 
     * @param string $password
     */

   public function insertUser($lastName, $firstName, $email, $password){

        $query = "INSERT INTO user (last_name, first_name, email, password) VALUES ('$lastName','$firstName','$email','$password')";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();

        $newId = $this->db->getPDO()->lastInsertId();

    }

    /**
     * update user database
     * 
     */
    public function updateUser($lastName, $firstName, $email, $password, $idUser){
        $query = "UPDATE user  SET last_name='$lastName', first_name='$firstName', email='$email', password='$password' WHERE idUser='$idUser' ";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
    }

    public function getAllUser(){
        $results = [];
        $query = $this->db->getPDO()->prepare("SELECT idUser, last_name, first_name, email FROM user ");
        $query->execute();
        $query=$query->fetchall();
        foreach($query as $data){
            $user= new User($data['idUser'], $data['last_name'], $data['first_name'], $data['email']);
            array_push($results, $user);
        }
        return $results;
    }
}