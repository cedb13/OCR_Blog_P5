<?php
namespace App;

/**
 * Class Autoloader
 * @package App
 */
class Autoloader{

    /**
     * Register our autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    /**
     * Includes the file corresponding to our class
     * @param string $class class name load
     */
    static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace (__NAMESPACE__.'\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ .'/'.$class.'.php';
        }
    }
}