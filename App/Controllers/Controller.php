<?php
namespace App\Controllers;

use App\Models\Model;
use App\Lib\UserService;
use App\Lib\PostService;

class Controller{

    public $postService;
    public $userService;
    protected $viewPath;
    protected $template = 'default';
    public $contents = array();
    public static $publicDirUrl = 'http://localhost/OCR_Blog_P5/public';

    public function __construct(){
        session_start();
        $this->userService = new UserService;
        $this->postService = new PostService;
        $this->viewPath = '/App/Views/templates';
    }

  protected function loadModel($modelName){
        $this->$modelName = Model::getInstance()->getTable($modelName);
    }

    public function setContents($contents){
        $this->contents = array_merge($this->contents,$contents);
    }

    public function getContents(){
        return $this->contents ;
    }

    public function render($view){
        extract($this->contents);
        ob_start();
        require(ROOT.$this->viewPath .DIRECTORY_SEPARATOR. str_replace('.', '/', $view) .'.php');
       // $publicDirUrl = self::$publicDirUrl;
        $content_layout = ob_get_clean();
        if($this->template==false){
            echo $content_layout;
        }
        else{
            require(ROOT.$this->viewPath .DIRECTORY_SEPARATOR.$this->template.'.php');
        }
    }

    public static function displayTitle(){
        $displayTitle = Model::getTitle();
        if(!empty(Model::getTitle())){
            return $displayTitle;
        }
    }

    public static function getPublicDirUrl(){

        return self::$publicDirUrl;

    }
    public static function setPublicDirUrl($publicDirUrl){

        self::$publicDirUrl = $publicDirUrl;

    }

}