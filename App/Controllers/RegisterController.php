<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Models\Model;
use App\Models\User;
use App\Lib\UserService;
use App\Lib\PostService;


class RegisterController extends Controller{

    public function show(){
        $posts['posts'] = $this->postService->getAllPost();
        $test['test']= array ('message1'=>'Félicitation', 'message2'=>'vous ne correspondez pas au profil');
        $this->setContents($posts);
        $this->setContents($test);
        $this->render('register');
    }

   
    public function register(){

        $message = false;
        if(isset($_POST)){

            $register = empty($register);
            //On récupère les données du formulaire
            $lastName		= htmlspecialchars(strip_tags($_POST['lastName']));
            $firstName		= htmlspecialchars(strip_tags($_POST['firstName']));
            $emailSanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email			= filter_var($emailSanitize, FILTER_VALIDATE_EMAIL);
            $password		= $_POST['password'];
    
            $messages['messages']= array ('message1'=>"vous êtes bien enregistré", 'message2'=>"Vous n'êtes pas enregistré", 'message3'=>"il semblerait que vous avez déjà un compte!");
    
            if($this->userService->getUserByCredential($email, $password) == false && !$this->userService->isEmailExists($email)){
                 //insertion du résultat
                $register=$this->userService->insertUser($lastName, $firstName, $email, $password);
                $user= $this->userService->getUserByCredential($email, $password);
                $message = true;
    
                $_SESSION['user'] = $user;
                $_SESSION['idUser'] = $_SESSION['user']->idUser;
                $_SESSION["firstName"] = $_SESSION['user']->firstName;
                $_SESSION["lastName"] = $_SESSION['user']->lastName;
    
    
                header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=admin');
                
            }
            else{
                header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=register');
            }

        }

    }

}