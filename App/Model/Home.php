<?php

namespace App\Model;

use App\Lib\App;
use App\Model\Table as Table;


class Home extends Table{

    protected static $table = 'home';

    //pour récupérer mes contenus de la home
    public static function getInfo(){
        return App::getDb()->query('SELECT * FROM home', get_called_class());

    }


    public function getUrl(){
        return 'index.php?page=home';
    }

    public function getPicture(){
        $picture= $this->picture;
        return $picture;
    }

    public function getContent(){
        $contentHome= $this->content_home;
        return $contentHome;
    }


}