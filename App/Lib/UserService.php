<?php

namespace App\Lib;

use App\Lib\Database as Db;

use App\Models\User;

class UserService{

    private $db;
    public const PASSWORD_MIN_LEN = '8';
    public const USER_MIN_KEY = ['last_name','first_name', 'email', 'password', 'passwordConfirm'];

    public function __construct(){
        $this->db = new Db;
    }

    public function getUserByCredential($email, $password) {
        $result = $this->db->getPDO()->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");
        $result->execute();
        $result=$result->fetch();
        if($result){
            $user= new User($result['idUser'], $result['last_name'], $result['first_name'], $result['email']);
            return $user;
        }
        return false;
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
     * registration status message
     *
     * @param string $lastName  
     * @param string $firstName
     * @param string $email 
     * 
     */
    public function registerStatus($lastName, $firstName, $email){
        $isUsernameExists = $this->isUsernameExists($lastName, $firstName);
        $isEmailExists = $this->isEmailExists($email);
        if ($isUsernameExists) {
            $response = array(
                "status" => "error",
                "message" => "Vos nom et prénom existe déjà."
            );
        } else if ($isEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "votre email existe déjà."
            );
        } 
    }


   public function insertUser($lastName, $firstName, $email, $password){

        $query = "INSERT INTO user (last_name, first_name, email, password) VALUES ('$lastName','$firstName','$email','$password')";
        $sth = $this->db->getPDO()->prepare($query);
        $sth->execute();
        $sth=$sth->fetch();

        $newId = $this->db->getPDO()->lastInsertId();

    }

}