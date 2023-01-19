<?php

namespace App\Model;

use App\Lib\App;
use App\Model\Table as Table;


class UserAdmin extends Table{



    //pour récupérer mes contenus de la table administration_user
    public static function getInfo(){
        $mail = $_POST['mail'];
        $password = htmlspecialchars($_POST['password']);
        return App::getDb()->prepare('SELECT * FROM administration_user WHERE mail = :mail AND password = :password', ['mail'=>$mail, 'password'=>$password], get_called_class());
    }

    public static function login()
    {
        if (!empty($_POST) && !empty($_POST['mail']) && !empty($_POST['password'])) {
            $mail = $_POST['mail'];
            $password = htmlspecialchars($_POST['password']);
            $user = App::getDb()->prepare('SELECT * FROM administration_user WHERE mail = :mail AND password = :password', ['mail'=>$mail, 'password'=>$password], get_called_class());
            if (!empty($user)) {
                $_SESSION['auth'] = $user; 
            }
        }
        else {
            $user = null;
        }
        return $user;
    }

    public static function logMessage(){
        if(self::login() === null){
        $message['message'] = 'Bienvenue sur notre site';
        }
        elseif(empty(self::login())){
            $message['message'] = 'Votre mail ou votre mot de pass ne sont pas bon';
        }
        elseif(!empty(self::login())){
            $user = self::login()[0];
            $message['message'] = "Bonjour $user->first_name $user->last_name ";
        }
        return  $message['message'];
    }


    public static function deconnect(){
        $deconnect = $_POST['deconnect'];
        if(!empty($deconnect)){
            session_destroy();
            header('Location:../Views/templates/home.php');
            $deconnect = true;
        }
        else{
            $deconnect = null;
        }

        return $deconnect;
    }

    public static function decoMessage(){
        if(!empty(self::deconnect())){
            $messageDeco['messageDeco'] = "Vous êtes bien déconnecté";
        }
        else{
            $messageDeco['messageDeco'] = "";
        }
        return  $messageDeco['messageDeco'];
    }

    public static function modalMessage(){
        if(self::login() === null){
            $modalMessage['modalMessage'] = 'Login';
        }
        elseif(empty(self::login())){
            $modalMessage['modalMessage'] = 'Login';
        }
        elseif(!empty(self::login())){
            $modalMessage['modalMessage'] = 'Deconexion';
        }
        return $modalMessage['modalMessage'];
    }

    public static function displayNone(){
        $displayNone = 'style = "display : none"';
        return $displayNone;
    }

}
