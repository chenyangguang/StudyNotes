---
title: 设计模式-策略模式
date: 2017-11-24 07:23:27
tags:
- 设计模式
---

# 0x00 策略模式

策略模式，也叫政策模式, 使用的是面向对象的继承和多态机制。

## 定义

** Define a amily of algorithms, encapsulate each one, and make them interchangeable**. (定义一组算法，将每个算法都封装起来，并且使它们之间可以交换。) 

<!--more-->

## 三个角色组成
+ Context 封装角色, 也称上下文角色，起承上启下封装作用，屏蔽高层模块对策略，算法的直接访问，封装可能存在的变化。
+ Strategy 抽象策略角色，策略、算法家族的抽象，通常为接口，定义每个策略或算法必须具有的方法和属性。
+ ConcreteStrategy 具体策略角色，实现抽象策略中的操作，该类含有具体的算法。


## 优点

+ 算法可以自由切换
只要实现了抽象策略，就成为了策略家族的一个成员，通过封装角色对其进行封装，保证对外提供“可自由切换”的策略。
+ 避免使用多重条件判断
策略家族对外提供的访问接口就是封装类，简化操作，避免条件语句判断。
+ 易于扩展

## 缺点
+ 策略类数量增多
每个策略都是一个类，复用的可能性很小，类数量持续增多。
+ 所有的策略类都需要对外暴露
上层模块必须知道有哪些策略，才能进一步决定使用哪一个策略。

## 使用场景

+ 多个类只有算法或行为上略有不同的场景。
+ 算法需要自由切换的场景。
+ 需要屏蔽算法规则的场景。


## PHP 实现

```php
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

```

# 0x01 小结
类似于可以提供上、中、下对策的场景选择时，使用策略模式最佳。

<!--more-->
