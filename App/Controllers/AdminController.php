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

    public function updateInfosUser(){

        if(isset($_POST)){

            $infoUser      = empty($infoUser);
            $idUser		    = $_SESSION['idUser'];
            $lastName		= htmlspecialchars(strip_tags($_POST['newLastName']));
            $firstName		= htmlspecialchars(strip_tags($_POST['newfirstName']));
            $email_sanitize	= filter_var($_POST['newEmail'], FILTER_SANITIZE_EMAIL);
            $email			= filter_var($email_sanitize, FILTER_VALIDATE_EMAIL);
            $password		= $_POST['newPassword'];

            if($idUser>0){
                $infoUser=$this->userService->updateUser($lastName, $firstName, $email, $password, $idUser);
            }      
    
            header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=admin');
            
        }
    }

}
