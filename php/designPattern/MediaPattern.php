<?php

// 通用抽象中介者
abstract class Mediator {
    protected  $colleague;

    public function getColleague() {
        return $this->colleague;
    }

    public function setColleague(ConcreteColleague $conColl) {
        $this->colleague = $conColl;
    }

    abstract public function doSth();
}

// 通用中介者
class ConcreteMediator extends  Mediator {
    public function dosth() {}
}

// 抽象同事类
abstract class Colleague {
    protected $mediator;

    public function Colleague(Mediator $_mediator) {
        $this->mediator = $_mediator;
    }
}

// 具体同事类
class ConcreteColleague extends Colleague {
    public function ConcreteColleague(Mediator $_mediator) {
        parent::setColleague($_mediator);
    }

    // 自发行为
    public function selfMethod() {}

    // 依赖方法
    public function relyMethod() {
        parent::doSth(); // 委托中介处理
    }
}
?>
