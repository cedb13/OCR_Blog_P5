<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;

class LoginController extends Controller{

   

    public function login() {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user= $this->userService->getUserByCredential($email, $password);
            if ($user) {
                $_SESSION['auth'] = true;
                $_SESSION['auth_Error'] = false;
                $_SESSION['user'] = $user;
            } else {
                $_SESSION['auth_Error'] = true;
                $_SESSION['auth'] = false;

            }
        }

        header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=register');
    }


     public function logout(){
            
        $_SESSION = array(); // on vide les variables de session    
        session_destroy();
        header('Location:http://localhost/OCR_Blog_P5/public/index.php/home');
     }   


}