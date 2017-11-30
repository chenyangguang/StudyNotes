<?php

// 子系统
class SubsystemOne {
    public function dosthFir()
    {
        echo 'subsystem class one.';
    }
}
class SubsystemTwo {
    public function dosthSec()
    {
        echo 'subsystem class two.';
    }
}
class SubsystemThr {
    public function dosthThr()
    {
        echo 'subsystem class three.';
    }
}

// 门面类
class Facade {
    private $objOne;
    private $objTwo;
    private $objThree;
    private $context;

    public function __construct()
    {
        $this->objOne = new SubsystemOne();
        $this->objTwo = new SubsystemTwo();
        $this->objThr = new SubsystemThr();
        $this->context = new Context();
    }

    public function jobFir()
    {
        $this->objOne->dosthFir();
    }
    public function jobSec()
    {
        $this->objTwo->dosthSec();
    }
    public function jobThr()
    {
        $this->context->combineJob();
    }
}

// 封装类, 不要直接参与子系统内的业务逻辑
class Context {
    private $objOne;
    private $objThr;

    public function __construct()
    {
        $this->objOne = new SubsystemOne();
        $this->objThr = new SubsystemThr();
    }

    public function combineJob()
    {
        $this->objOne->doSthFir();
        $this->objThr->doSthThr();
    }
}