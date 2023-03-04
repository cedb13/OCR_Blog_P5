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
        $adminMessages['adminMessages']= array ('message1'=>"Bienvenu sur votre interface d'administration", 'message2'=>"Cliquer ici pour modifier vos informations personnels", 'message3'=>"Modifier/Ajouter/Supprimer un post", 'message4'=>"Valider/Supprimer un commentaire");

        $this->setContents($posts);
        $this->setContents($adminMessages);
        $this->render('admin');
    }
}
