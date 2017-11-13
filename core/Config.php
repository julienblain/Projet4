<?php
//constructeur qui lit l'array de config qu'on insere dans settings
//singleton
namespace Core;

class Config {
    private $settings = [];
    private static $_instance; //instance de bdd

    public function __construct($fileConfig) {
        $this->settings = require($fileConfig);
    }

    public static function getInstance($fileConfig) {
        if(is_null(self::$_instance)) {
            self::$_instance = new Config($fileConfig) ;
        }
        return self::$_instance;
    }

    //utiliser dans getdb, settings de l'app
    public function getSettings($key) {
        if(!isset($this->settings[$key])) {
            return null;
        }
        else {
            return $this->settings[$key];
        }
    }
}


 ?>
