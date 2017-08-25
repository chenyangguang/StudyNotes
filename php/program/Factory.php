<?php

/*
 * 最简单的一个工厂模式(生产世界上最好的语言^-^)
 */
class PHP {}
class Go {}
class Python {}

class Factory {
    private function __construct() {}
    private static $obj = [];

    public static function createObject($nameClass) {
        if (!isset(self::$obj[$nameClass])) {
            self::$obj[$nameClass] = new $nameClass();
        }

        return self::$obj[$nameClass];
    }
}

$php = Factory::createObject('PHP');
$go = Factory::createObject('Go');
$python = Factory::createObject('Python');

var_dump($php, $go, $python);

/*
object(PHP)#1 (0) {
    }
object(Go)#2 (0) {
    }
object(Python)#3 (0) {
    }
*/