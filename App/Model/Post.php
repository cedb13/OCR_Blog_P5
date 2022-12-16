<?php

namespace App\Model;

use App\Lib\App;
use App\Model\Table as Table;

class Post extends Table{

    protected static $table = 'posts';

    //pour récupérer mes derniers posts
    public static function getLast(){
        return App::getDb()->query('SELECT * FROM posts', get_called_class());

    }

   //pour récupérer un post
   /* on fait d'abord un 'preprare' de la requête sql pour éviter les injections */
   public static function getOne(){
    $id= $_GET['id'];
    return App::getDb()->prepare('SELECT * FROM posts WHERE idpost = ?', [$id], get_called_class());
   }

    public function getUrl(){
        return 'index.php?page=post&id=' . $this->idpost;
    }

    public function getCaption(){
        return $this->caption;
    }

    public function getExcerpt(){
        $html = '<p>' . substr($this->content_post, 0, 250) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }

    public function getDate(){
        $html = '<p>date de dernière mise à jour : ' . $this->date_last_upload . '</p>';
        return $html;
    }


}