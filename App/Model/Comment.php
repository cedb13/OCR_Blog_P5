<?php

namespace App\Model;

use App\Lib\App;
use App\Model\Table as Table;


class Comment extends Table{
    
    protected static $table = 'comments';
    //pour récupérer les derniers commentaires par post
    public static function getLastComment(){
        $id= $_GET['id'];
        return App::getDb()->prepare('SELECT idcomment, comments.title, content_comment, last_name, first_name, date_publication, posts.idpost as post 
        FROM comments 
        LEFT JOIN nave_user 
            ON idNaveUser = nave_user_idNaveUser
        LEFT JOIN posts
            ON idpost = post_idpost WHERE post_idpost = ?', [$id], get_called_class());

    }
}