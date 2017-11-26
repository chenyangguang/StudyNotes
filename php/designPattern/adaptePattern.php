<?php
interface Target {
    public function job();
}

class ConcreteTarget implements Target {
    public function job() {
        echo '220 v 电流可以正常使用' . PHP_EOL;
    }
}

class Adaptee {
    public function doSth() {
        echo '25000 V高压电流也能用' . PHP_EOL;
    }
}

class Adapter extends Adaptee implements Target {
    public function job() {
        parent::doSth();
    }
}

class Client {
    public static function main() {
        $target  = new ConcreteTarget();
        $target->job();
        $target2 = new Adapter();
        $target2->job();
    }
}
(new Client())::main();
// 220 v 电流可以正常使用
// 25000 V高压电流也能用