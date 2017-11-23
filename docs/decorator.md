---
title: 设计模式-装饰者模式
date: 2017-11-23 17:03:43
tags:
- 设计模式
---

# 0x00 装饰者模式

## 定义
**Attach additional responsibilities to an object dynamically keeping the same interface. Decorators provide a flexible alternative to subclassing for extending functionality.(动态地给一个对象添加一些额外的职责。就增加功能来说，装饰模式相比生成子类更为灵活。) **

<!--more-->
## 通用类四个角色
+ Component 抽象组件, 作为最核心最原始的对象接口或者抽象类。
+ ConcreteComponent 具体构件, 接口或者抽象类的实现。
+ Decorator 装饰角色, 属性中必然有一个 private 变量指向 Component 抽象组件。
+ 具体装饰角色

## 优点 
+ 装饰类和被装饰类可以独立发展, 而不会相互耦合。Component 类无须知道 Decorator 类, Decorator 类是从外部扩展 Component 类的功能，而 Decorator 也不需知道具体的构件。
+ 装饰模式是继承关系的一个替代方案。
+ 动态地扩展一个实现类的功能。

## 缺点
多层复杂的装饰, 数量增加, 会增加系统的复杂度, 同时带给排查问题的时间和难度。

## php 实例

```php

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

```

# 0x01 小结

优点和缺点是并存的，优点有时候也会转化成缺点。反之，亦然。 
<!--more-->
