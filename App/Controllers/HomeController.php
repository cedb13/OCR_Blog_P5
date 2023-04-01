<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Models\Post;
use App\Models\Model;
use App\Models\User;
use App\Lib\UserService;
use App\Lib\PostService;

class HomeController extends Controller{

    public function show(){
    
        $posts['posts'] = $this->postService->getAllPost();
        $lastPosts['lastPosts'] = $this->postService->getLastPost();
        $contents['cv']= array ('nom'=>'Bonche', 'prenom'=>'Cédric');
        $this->setContents($posts);
        $this->setContents($lastPosts);
        $this->setContents($contents);
        $this->render('home');
        
    }


    public function notFound(){
        $this->render('notFound');
    }

    public function contactForm(){
        if (isset($_POST['message'])) {
            $entete  = 'MIME-Version: 1.0' . "\r\n";
            $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $entete .= 'From: webmaster@leblogdevdeced.fr' . "\r\n";
            $entete .= 'Reply-to: ' . $_POST['email'];

            $message = '<h1>Message envoyé depuis la page Contact de leblogdevdeced</h1>
            <p><b>Email : </b>' . $_POST['email'] . '<br>
            <b>Message : </b>' . htmlspecialchars($_POST['message']) . '</p>';

            $retour = mail('oldced.devtest@gmail.com', 'Envoi depuis page Contact', $message, $entete);
            if($retour)
                echo '<p>Votre message a bien été envoyé.</p>';
        }
        header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=home');
    }
}