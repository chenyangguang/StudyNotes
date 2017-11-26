---
title: 设计模式-适配器模式
date: 2017-11-26 08:39:12
tags:
- 设计模式
---

# 0x00 装饰者模式
适配器模式，也叫变压器模式, 包装模式(Wrapper)。 装饰者模式也是包装模式的一种。电流传输过程中使用的高压电流，输送到千里之外的家家户户前，并不能直接使用，否则直接烧坏了电器。这就需要进行降压，使用适配器将高压电流转变成家用电器适用的 220v(中国) 电流。

## 定义
**Convert the interface of  a class into another interface clients expect. Apdapter lets classes work togetherthat couldn't otherwise because of incompatible interfaces.**(将一个类的接口变换成客户端所期待的另一种接口，从而使原本因接口不匹配而无法在一起工作的两个类能够在一起工作。)

<!--more-->

## 角色
* Target 目标角色, 期望最后提供的目标接口。存在。
* Adaptee 源角色, 需要转变的接口。存在。
* Adapter 适配器角色，核心角色。 

## 优点
+ 使两个没有任何关系的类在一起运行。
+ 增加类的透明性。 
+ 提高类的复用度。
+ 灵活。

## php实现

```php
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

```
# 0x01 小结



<!--more-->

