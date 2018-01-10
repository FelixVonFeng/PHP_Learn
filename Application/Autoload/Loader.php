<?php
/**
*@Author Felix Von <feng2413506241@gmail.com>
*@Copyright 2017 Felix Von
*@License http://www.php.net/license/3_01.txt PHP License 3.01
*@File Loader.php
*@Time 2017年12月22日 星期五 17时52分43秒
*/

class Loader {

    protected static $dirs = array() ;
    protected static $registered = 0 ;
    //protected static $UNABLE_TO_LOAD = "Unable load file: ";


    protected static function loadFile($file) {
        if(file_exists($file)) {
            require_once $file ;
            return TRUE ;
        }
        return FALSE ;
    }

    public static function autoLoad($class) {
        $success = FALSE ;
        $fn = str_replace('\\' , DIRECTORY_SEPARATOR , $class).'.php' ;
        foreach(self::$dirs as $start) {
            $file = $start . DIRECTORY_SEPARATOR . $fn ;
            if(self::loadFile($file)) {
                $success = TRUE ;
                break ;
            }
        }
        if(!$success) {
            if(!self::loadFile(__DIR__ . DIRECTORY_SEPARATOR . $fn)) {
                echo 'unable to load' ;
            }
        }
        return $success ;
    }

    public static function addDirs($dirs) {
        if(is_array($dirs)) {
            self::$dirs = array_merge(self::$dirs , $dirs) ;
        } else {
            self::$dirs = $dirs ;
        }
    }

    public static function init($dirs = array()) {
        if($dirs) {
            echo $dirs ;
            self::addDirs($dirs) ;
        }
        if(self::$registered == 0) {
            spl_autoload_register(__CLASS__ . '::autoLoad') ;
            self::$registered++ ;
        }
    }

    public function __construct($dirs = array()) {
        self::init($dirs) ;
    }

}
