<?php
namespace App\Controllers;

use App\Models\Model;
use App\Lib\UserService;
use App\Lib\PostService;
use App\Lib\CommentService;

class Controller{

    public $userService;
    public $postService;
    public $commentService;
    protected $viewPath;
    protected $template = 'default';
    public $contents = array();

    public function __construct(){
        session_start();
        $this->userService = new UserService;
        $this->postService = new PostService;
        $this->commentService = new CommentService;
        $this->viewPath = '/App/Views/templates';
    }

  protected function loadModel($modelName){
        $this->$modelName = Model::getInstance()->getTable($modelName);
    }

    public function getContents(){
        return $this->contents ;
    }

    public function setContents($contents){
        $this->contents = array_merge($this->contents,$contents);
    }

    public function render($view){
        extract($this->contents);
        ob_start();
        require(ROOT.$this->viewPath .DIRECTORY_SEPARATOR. str_replace('.', '/', $view) .'.php');
        $content_layout = ob_get_clean();
        if($this->template==false){
            echo $content_layout;
        }
        else{
            require(ROOT.$this->viewPath .DIRECTORY_SEPARATOR.$this->template.'.php');
        }
    }

    protected function userIsConnected():bool {
<<<<<<< HEAD
        if (isset($_SESSION['auth']) ){
=======
        if (isset($_SESSION['user']) && $_SESSION['user']->idUser>0){
>>>>>>> Feature-issue-8-register_a_user_as_an_administration_user
              return true;
        }
            return false;   
     }

}