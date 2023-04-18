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
        $lastPosts['lastPosts'] = $this->postService->getLastPost();
        $message['message']= array ('message1'=>'');
        $this->setContents($posts);
        $this->setContents($lastPosts);
        $this->setContents($message);
        $this->render('register');
    }

   
    public function register(){

        if(!empty($_POST)){
            $register = empty($register);
            //On récupère les données du formulaire
            $lastName		= htmlspecialchars(strip_tags($_POST['lastName']));
            $firstName		= htmlspecialchars(strip_tags($_POST['firstName']));
            $emailSanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email			= filter_var($emailSanitize, FILTER_VALIDATE_EMAIL);
            $password       = $_POST['password'];
            $pwdHash		= password_hash($password, PASSWORD_DEFAULT);
    
    
            if($this->userService->getUserByCredential($email, $password) == false && !$this->userService->isEmailExists($email)){
                 //insertion du résultat
                $register=$this->userService->insertUser($lastName, $firstName, $email, $pwdHash);
                $user= $this->userService->getUserByCredential($email, $password);
    
                $_SESSION['user'] = $user;
                $_SESSION['idUser'] = $_SESSION['user']->idUser;
                $_SESSION["firstName"] = $_SESSION['user']->firstName;
                $_SESSION["lastName"] = $_SESSION['user']->lastName;
    
                header('Location:/OCR_Blog_P5/public/index.php?page=admin');
                
            }
            else{

                $message['message']= array ('message1'=>"il semblerait que vous ayez déjà un compte?");
                $lastPosts['lastPosts'] = $this->postService->getLastPost();
                $this->setContents($lastPosts);
                $this->setContents($message);
                $this->render('register');
            }

        }
        else{

            $message['message']= array ('message1'=>"Un problème est survenu, remplissez tous les champs et valider à nouveau");
            $lastPosts['lastPosts'] = $this->postService->getLastPost();
            $this->setContents($lastPosts);
            $this->setContents($message);
            $this->render('register');

        }

    }

}