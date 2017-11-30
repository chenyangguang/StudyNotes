---
title: 门面模式
date: 2017-11-30 07:56:29
tags:
- 设计模式
---

# 0x00 门面模式
外观模式.

## 定义
** Provide a unified interface to a set of interface in a subsystem. Facade defines a higher-level interface that makes the subsystem easier to use.(要求一个子系统的外部与内部的通信必须通过一个统一的对象进行．)**

## 角色
+ Facade 门面角色, 该角色知晓所有功能和责任，委托类．
+ Subsystem 子系统角色, 子系统并不知道门面类的存在．

## 优点
减少系统的相互依赖

## 缺点
不符合开闭原则．

## 应用场景
适用于:
+ 为一个复杂的模块或子系统提供一个供外界访问的接口．
+ 子系统相对独立.
+ 预防低水平人员带来的风险扩散．

## php实现
```
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
```

# 0x01 小结
门面不参与子系统内的业务逻辑．Laravel 框架就用了不少 Facade.
