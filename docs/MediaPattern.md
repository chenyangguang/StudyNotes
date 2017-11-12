---
title: 中介者模式
date: 2017-11-12 08:46:14
tags:
- 设计模式
---

# 0x00 中介者模式
现实生活中像神舟飞船的指挥中心, 机场的调度中心, MVC 框架中的 C(controller), 媒体网关, 房租中介等等, 都有着中介者的影子．中介者模式还叫 **调停者模式** ．

## 定义
*Define an boject that encapsulates how a set of objects nteract. Mediator promotes loose coupling by keeping objects from referring to each other explicitly, and it lets you vary their interaction independently.(用一个中介对象封装一系列的对象交互，中介者是各对象不需要显示地相互作用，从而使其耦合松散，而且可以独立地改变它们之间的交互．)*

## 构成
+ Mediator 抽象中介者角色, 抽象中介者角色定义统一的接口，用于各同事角色之间的通信．
+ Concrete Mediator 具体中介者角色, 具体中介者角色通过协调各同事角色实现协作行为，因此它必须依赖于同事角色．
+ Colleague 同事角色, 每个同事角色与其他的同事角色的通信, 必须经过"和事老"**中介者**协作．每个同事类的行为分为两种: 
 1. 自发行为: 同事本身的行为, 如改变对象自身的状态, 处理自己的行为等不需要依赖中介者的动作．
 2. 依赖方法: 依赖中介者才能完成的行为．

## 优点 
中介者模式减少了类之间的依赖，同事类只依赖于中介者, 将**一对多**的依赖变成**一对一**的依赖，减少依赖的同时也降低了类之间的耦合．

## 缺点
随着逻辑复杂度增加，原本 N　个对象直接的相互依赖关系转嫁给中介者和同事类的依赖关系，中介者的逻辑会逐渐复杂，并且变得越来越庞大臃肿．

## 使用场景
多个对象之间**紧密耦合**(在类图中出现了蜘蛛网状结构)的情况下，用中介者是好的选择．
话说那些什么经纪人什么秘书的是不是中介者模式？

## php 实现
```
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
```

# 小结 
字面上中介和代理多少带着模糊的雷同，所以中介和代理的区别是？
