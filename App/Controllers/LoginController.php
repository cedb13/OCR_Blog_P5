<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;

class LoginController extends Controller{

   

    public function login() {
<<<<<<< HEAD
       /* if (isset($_POST['email']) && isset($_POST['password'])) {
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
=======
>>>>>>> Feature-issue-8-register_a_user_as_an_administration_user

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

       /* $userInfo = empty($userInfo);
        //On récupère les données du formulaire
        $email_sanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $email			= filter_var($email_sanitize, FILTER_VALIDATE_EMAIL);
        $password		= password_hash($_POST['password'], PASSWORD_DEFAULT);

        $messages['messages']= array ('message1'=>"vous êtes bien enregistré", 'message2'=>"Vous n'êtes pas enregistré", 'message3'=>"il semblerait que vous avez déjà un compte!");

        if(isset($_POST) && $this->userService->getUserByCredential($email, $password) == true && $this->userService->isEmailExists($email))
        {
            $userInfo = $this->userService->getInfoUser();
            $user= $this->userService->getUserByCredential($email, $password);

            $_SESSION['auth'] = true;
            $_SESSION['auth_Error'] = false;
            $_SESSION['user'] = $user;

            header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=admin');
            
        }
        else{

            header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=login');

        }

<<<<<<< HEAD
        header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=home');
    }*/
        $email_sanitize = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $email          = filter_var($email_sanitize, FILTER_VALIDATE_EMAIL);
        $password       = password_hash($_POST['password'], PASSWORD_DEFAULT);
=======

    }*/
        
>>>>>>> Feature-issue-8-register_a_user_as_an_administration_user

        if(isset($_POST) && $this->userService->getUserByCredential($email, $password) == true && $this->userService->isEmailExists($email))
        {
            
            $user= $this->userService->getUserByCredential($email, $password);


            $_SESSION['auth'] = true;
            $_SESSION['auth_Error'] = false;
            $_SESSION['user'] = $user;
            
        }
        else{

            $_SESSION['auth_Error'] = true;
            $_SESSION['auth'] = false;

            header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=home');

        }

        header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=admin');
    }

     public function logout(){
            
        $_SESSION = array(); // on vide les variables de session    
        session_destroy();
        header('Location:http://localhost/OCR_Blog_P5/public/index.php/home');
     }   


}