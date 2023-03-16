<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Models\Post;
use App\Models\Model;
use App\Models\User;
use App\Lib\UserService;
use App\Lib\PostService;

class AdminController extends Controller{

    public function show(){
        
        
        $posts['posts'] = $this->postService->getAllPost();
        $userInfo['userInfo'] = $this->userService->getInfoUser();
        $adminMessages['adminMessages']= array ('message1'=>"Bienvenu sur votre interface d'administration", 'message2'=>"Cliquer ici pour modifier vos informations personnels", 'message3'=>"Modifier/Ajouter/Supprimer un post", 'message4'=>"Valider/Supprimer un commentaire");
        $this->setContents($posts);
        $this->setContents($userInfo);
        $this->setContents($adminMessages);
        $this->render('admin');
    }

    public function changeInfosUser(){

        $userInfo= $this->userService->getInfoUser();
        foreach($userInfo as $value){
           $idUser = $value->idUser;
        }
        //On récupère les données du formulaire
        foreach($column as $value){

            if(isset($_POST['newLastName'])){
                $column = ['last_name'];
                $value = htmlspecialchars(strip_tags($_POST['newLastName']));
            }
            elseif(isset($_POST['newFirstName'])){
                $column = ['first_name'];
                $value = htmlspecialchars(strip_tags($_POST['newFirstName']));
                $newMessages['newMessages']=$newMessages['newMessage1'];
                $input = "Le prénom";
            }
            elseif(isset($_POST['newEmail'])){
                $column = ['email'];
                $email_sanitize = filter_var($_POST['newEmail'], FILTER_SANITIZE_EMAIL);
                $value = filter_var($email_sanitize, FILTER_VALIDATE_EMAIL);
                $newMessages['newMessages']=$newMessages['newMessage1'];
                $input = "L'email";
            }
            elseif(isset($_POST['newPassword'])){
                $column = ['password'];
                $value = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                $newMessages['newMessages']=$newMessages['newMessage1'];
                $input = "Le password";
            }

            $columns = array_push($column);

        }
                     

            header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=admin');
        
    }
}
