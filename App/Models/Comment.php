<?php

namespace App\Models;

use App\Models\Model as Model;
use App\Lib\Database;


class Comment extends Model{
    
    protected static $table = 'comment';

    //pour récupérer les derniers commentaires par post
    public static function getCommentByPost(){
        $id= $_GET['id'];
        return Database::getPDO()->prepare('SELECT idcomment, comment.title, content_comment, last_name, first_name, date_publication, post.idpost as post 
        FROM comment 
        LEFT JOIN nave_user 
            ON idNaveUser = nave_user_idNaveUser
        LEFT JOIN post
            ON idpost = post_idpost WHERE post_idpost = ?', [$id], get_called_class());

    }
}