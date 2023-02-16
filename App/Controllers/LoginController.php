<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;

class LoginController extends Controller{

   

    public function login() {
            //$_POST['mail']='cedric.bonche@gmail.com';
           // $_POST['password']='groot';
        if (isset($_POST['mail']) && isset($_POST['password'])) {
            $mail = $_POST['mail'];
            $password = htmlspecialchars($_POST['password']);
            $user= $this->userService->getUserByCredential($mail, $password);
            if ($user) {
            $_SESSION['auth'] = true;
            $_SESSION['user'] = $user;
            /*echo "<pre>";
            var_dump($_SESSION);
            var_dump($_POST);
            echo "</pre>";
            die();*/
            //var_dump($_SESSION);
            
            } else {
               $_SESSION['error'] = 'mail or password incorrect';
                //var_dump("error");
            }
            
        }

        header('Location:http://localhost/OCR_Blog_P5/public/index.php/home');
    }

    protected function userIsConnected():bool {
        session_start();
        if (isset($_SESSION['auth'])){
              return true;
        }
            return false;   
     }

     public function logout(){
            //var_dump($this->viewPath);
            //die;
            session_destroy();
            session_start();
           /* echo  '<pre>';
            var_dump($_SESSION);
            echo '</pre>';
            die;*/

            header('Location:http://localhost/OCR_Blog_P5/public/index.php/home');
     }   

}