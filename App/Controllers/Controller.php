<?php
namespace App\Controllers;

use App\Lib\App;

abstract class Controller{

    protected $viewPath;
    protected $template = 'default';
    public $contents = array();

    public function __construct(){


        $this->viewPath = '/App/views/templates';

    }

  protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable($model_name);
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
        $content_layout = ob_get_clean();
        if($this->template==false){
            echo $content_layout;
        }
        else{
            require(ROOT.$this->viewPath .DIRECTORY_SEPARATOR.$this->template.'.php');
        }
    }
}