<?php
/*
 * decorator pattern
 */

abstract class Component {
    abstract function doSth();
}

class ConcreteComponent extends Component {
    public function doSth() {
        echo 'concrete component';
    }
}

// 抽象装饰类
abstract class Decorator extends Component {
    private $component = null;
    public function Decorator(Component $_component) {
        $this->component = $_component;
    }

    public function doSth()
    {
        $this->component->doSth();
    }
}

// 具体装饰类
class ConcreteDecorator1 extends Decorator {
    public function ConcreteDecorator1(Component $_component) {
        parent::__construct($_component);
    }

    private function deco1() {
        echo 'decorator 1 ';
    }

    public function doSth() {
        $this->deco1();
        parent::doSth();
    }
}
class ConcreteDecorator2 extends Decorator {
    public function ConcreteDecorator2(Component $_component) {
        parent::__construct($_component);
    }

    private function deco2() {
        echo 'decorator 2 ';
    }

    public function doSth() {
        $this->deco2();
        parent::doSth();
    }
}


$component = new ConcreteComponent();
$component = new ConcreteDecorator1($component);
$component = new ConcreteDecorator2($component);
echo $component->doSth();

// decorator 2 decorator 1 concrete component


