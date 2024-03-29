<?php
namespace App\Controllers;

use App\Models\Model;
use App\Lib\UserService;
use App\Lib\PostService;
use App\Lib\CommentService;
use App\Lib\SendService;

class Controller{

    public $userService;
    public $postService;
    public $commentService;
    public $sendService;
    protected $viewPath;
    protected $template = 'default';
    public $contents = array();

    public function __construct(){
        session_start();
        $this->userService = new UserService;
        $this->postService = new PostService;
        $this->commentService = new CommentService;
        $this->sendService = new SendService;
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
        $contentLayout = ob_get_clean();
        if($this->template==false){
            echo $contentLayout;
        }
        else{
            require(ROOT.$this->viewPath .DIRECTORY_SEPARATOR.$this->template.'.php');
        }
    }

    protected function userIsConnected():bool {

        if (isset($_SESSION['user']) && $_SESSION['user']->idUser>0){
              return true;
        }
            return false;   
     }

}