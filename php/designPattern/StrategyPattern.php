<?php

// 抽象策略接口
interface Strategy {
    public function doSth();
}

// 具体策略角色
class ConcreteStrategy1 implements Strategy {
    public function doSth()
    {
        echo 'strategy 1';
    }
}


class ConcreteStrategy2 implements Strategy {
    public function doSth()
    {
        echo 'strategy 2';
    }
}


// 封装角色
class Context {
    private $strategy = null;
    public function Context(Strategy $_strategy)
    {
        $this->strategy = $_strategy;
    }

    public function doAct()
    {
        $this->strategy->doSth();
    }
}

// 场景类
class Client {
    public static function main()
    {
        $strategy = new ConcreteStrategy1();
        $context = new Context($strategy);
        $context->doAct();
    }
}


//调用
(new Client())::main(); // output: strategy 1
