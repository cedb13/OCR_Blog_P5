<?php

namespace App\Model;

use App\Lib\App;
use App\Model\Table as Table;


class UserAdmin extends Table{



    //pour récupérer mes contenus de la table administration_user
    public static function getInfo(){
        return App::getDb()->query('SELECT * FROM administration_user', get_called_class());

    }

    public function getMail(){
        $mail= $this->mail;
        return $mail;
    }

    public function getPassword(){
        $password= $this->password;
        return $password;
    }

    public function connect($mail,$password,$remember){
        $postData = $_POST;
        if($mail == $postData['mail'] && $password == $postData['password']){
            $_SESSION['admin']=1;
                if(isset($remember) && $remember=="1"){
                    setcookie('mail', $mail, time() +3600, null, null, false, true);
                    setcookie('password', $password, time() +3600, null, null, false, true);
                        }
                    }
        }

        function deconnect(){
            session_destroy();
            header('Location:./default.php');
        }

}