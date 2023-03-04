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

        $register = empty($register);
        //On récupère les données du formulaire
        $lastName		= htmlspecialchars(strip_tags($_POST['last_name']));
        $firstName		= htmlspecialchars(strip_tags($_POST['first_name']));
        $email_sanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $email			= filter_var($email_sanitize, FILTER_VALIDATE_EMAIL);
        $password		= password_hash($_POST['password'], PASSWORD_DEFAULT);

        $messages['messages']= array ('message1'=>"vous êtes bien enregistré", 'message2'=>"Vous n'êtes pas enregistré", 'message3'=>"il semblerait que vous avez déjà un compte!");

        if(isset($_POST) && $this->userService->getUserByCredential($email, $password) == false && !$this->userService->isEmailExists($email)) {
             //insertion du résultat
            $register=$this->userService->insertUser($lastName, $firstName, $email, $password);
            $user= $this->userService->getUserByCredential($email, $password);

            $_SESSION['auth'] = true;
            $_SESSION['auth_Error'] = false;
            $_SESSION['user'] = $user;

            
            
        }
        else{

            header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=register');

        }

        header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=admin');
    }
}