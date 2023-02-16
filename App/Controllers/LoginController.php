<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;

class LoginController extends Controller{

   

    public function login() {
        if (isset($_POST['mail']) && isset($_POST['password'])) {
            $mail = $_POST['mail'];
            $password = htmlspecialchars($_POST['password']);
            $user= $this->userService->getUserByCredential($mail, $password);
            if ($user) {
                $_SESSION['auth'] = true;
                $_SESSION['user'] = $user;
            } else {
               $_SESSION['auth'] = false;
            }
        }

        header('Location:http://localhost/OCR_Blog_P5/public/index.php/home');
    }

    protected function userIsConnected():bool {
        if (isset($_SESSION['auth'])){
              return true;
        }
            return false;   
     }

     public function logout(){
            
            session_destroy();
            header('Location:http://localhost/OCR_Blog_P5/public/index.php/home');
     }   

}