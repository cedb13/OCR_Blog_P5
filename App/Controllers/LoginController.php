<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;

class LoginController extends Controller{

   

    public function login() {

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email_sanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email = filter_var($email_sanitize, FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];



            if($user= $this->userService->getUserByCredential($email, $password)){
                $_SESSION['user'] = $user;
                $_SESSION['idUser'] = $_SESSION['user']->idUser;
                $_SESSION["first_name"] = $_SESSION['user']->first_name;
                $_SESSION["last_name"] = $_SESSION['user']->last_name;
                header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=admin');
            }
            else{
                $errorMessage['errorMessage'] = sprintf('Les informations envoyées ne permettent pas de vous identifier : (email=%s/password=%s)',
                $_POST['email'],
                $_POST['password']
                );
                $this->setContents($errorMessage);
                $this->render('relogin');
            }

        }
    }


     public function logout(){
            
        $_SESSION = array(); // on vide les variables de session    
        session_destroy();
        header('Location:http://localhost/OCR_Blog_P5/public/index.php/home');
     }   

}