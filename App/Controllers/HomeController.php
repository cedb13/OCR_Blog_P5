<?php

namespace App\Controllers;

require_once('../vendor/autoload.php');

use App\Controllers\Controller as Controller;
use App\Models\Post;
use App\Models\Model;
use App\Models\User;
use App\Lib\UserService;
use App\Lib\PostService;
use App\Lib\SendService;

class HomeController extends Controller{

    public function show(){
    
        $com['com']=array('com1'=>'Le blog Dev de Cédric','com2'=>'Informatique et développement');
        $posts['posts'] = $this->postService->getAllPost();
        $lastPosts['lastPosts'] = $this->postService->getLastPost();
        $contents['cv']= array ('nom'=>'Bonche', 'prenom'=>'Cédric');
        $this->setContents($com);
        $this->setContents($posts);
        $this->setContents($lastPosts);
        $this->setContents($contents);
        $this->render('home');
        
    }


    public function notFound(){
        $this->render('notFound');
    }

    public function contactForm(){
            
            $send = empty($send);
            if (!empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']) ){
                
                $lastName       = htmlspecialchars($_POST['lastName']);
                $firstName      = htmlspecialchars($_POST['firstName']);
                $emailSanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $email			= filter_var($emailSanitize, FILTER_VALIDATE_EMAIL);
                $subject        = htmlspecialchars(strip_tags($_POST['subject']));
                $message        = htmlspecialchars(strip_tags($_POST['message']));

                $send = $this->sendService->sendMail($subject, $email, $lastName, $firstName, $message);
                $com['com'] = array('com1'=>'Le blog Dev de Cédric','com2'=>'Votre message a bien été envoyé');
                $posts['posts'] = $this->postService->getAllPost();
                $lastPosts['lastPosts'] = $this->postService->getLastPost();
                $contents['cv']= array ('nom'=>'Bonche', 'prenom'=>'Cédric');
                $this->setContents($com);
                $this->setContents($posts);
                $this->setContents($lastPosts);
                $this->setContents($contents);
                $this->render('home');
            }
            else{
                $com['com'] = array('com1'=>'Le blog Dev de Cédric','com2'=>'Erreur envoi');
                header('Location:/OCR_Blog_P5/public/index.php?page=home#contact');
            }
    }
}