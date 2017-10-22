<?php
/*
 * 构造方法和克隆方法必须私有化
 */
class Animal {
    private static $_instance = null;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance() {
        if(is_null(self::$_instance) || !isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}

$animal = Animal::getInstance();
var_dump($animal);