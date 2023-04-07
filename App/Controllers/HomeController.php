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
       /* if (isset($_POST)) {
            $to             = "oldced.devtest@gmail.com";
            $subject        = htmlspecialchars($_POST['subject']);
            $message        = htmlspecialchars($_POST['message']);
            $emailSanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email			= filter_var($emailSanitize, FILTER_VALIDATE_EMAIL);

            $com['com'] = array('com1'=>'Le blog Dev de Cédric','com2'=>'Votre message a bien été envoyé');

            $headers  = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
            $headers .= 'From: oldced.devtest@gmail.com'."\r\n";
            $headers .= 'Reply-to: '.$email;

            $message = '<h1>Message envoyé depuis la page Contact de leblogdevdeced</h1>
            <p><b>Email : </b>'.$email.'<br>
            <b>Message : </b>'.$message.'</p>'; */

            /* echo "<pre>";
            var_dump($message);
            echo "<pre>";
            die;*/

           /* if(!mail($to, $subject, $message, $headers)){
                header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=home#contact');
            }
            else{

                $posts['posts'] = $this->postService->getAllPost();
                $lastPosts['lastPosts'] = $this->postService->getLastPost();
                $contents['cv']= array ('nom'=>'Bonche', 'prenom'=>'Cédric');
                $this->setContents($com);
                $this->setContents($posts);
                $this->setContents($lastPosts);
                $this->setContents($contents);
                $this->render('home');
            }   
        }*/

        /*    $to             = "idella.glover97@ethereal.email";
            $subject        = "test";
            $message        = "Hello";

            $headers  = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
            $headers .= 'From: idella.glover97@ethereal.email'."\r\n";*/



            /* echo "<pre>";
            var_dump($message);
            echo "<pre>";
            die;*/

           /* if(mb_send_mail($to, $subject, $message, $headers)){
                $com['com'] = array('com1'=>'Le blog Dev de Cédric','com2'=>'Votre message a bien été envoyé');
			}
			else{
                $com['com'] = array('com1'=>'Le blog Dev de Cédric','com2'=>'Erreur envoi');
			}

            $posts['posts'] = $this->postService->getAllPost();
            $lastPosts['lastPosts'] = $this->postService->getLastPost();
            $contents['cv']= array ('nom'=>'Bonche', 'prenom'=>'Cédric');
            $this->setContents($com);
            $this->setContents($posts);
            $this->setContents($lastPosts);
            $this->setContents($contents);
            $this->render('home');*/

            if (!empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']) ) {
                
                $lastName       = htmlspecialchars($_POST['lastName']);
                $firstName       = htmlspecialchars($_POST['firstName']);
                $emailSanitize	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $email			= filter_var($emailSanitize, FILTER_VALIDATE_EMAIL);
                $subject        = htmlspecialchars($_POST['subject']);
                $message        = htmlspecialchars($_POST['message']);
                
            }
            else{
                header('Location:http://localhost/OCR_Blog_P5/public/index.php?page=home#contact');
                die();
            }
    }
}