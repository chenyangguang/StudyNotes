---
title: 设计模式-抽象工厂模式
date: 2017-10-24 10:31:49
tags:
- 读书笔记
- 笔记
- 设计模式
---


##  0x00 抽象工厂模式

### 定义
 *Provide an interface or creating families of related or dependent objects without specifying their concrete classes* 
 (为创建一组相关或相互依赖的对象提供一个接口, 而且无须指定它们的具体类。)

 抽象工厂模式的通用类图:
![../photos/abstract-factory.png]()
![../photos/abstract-factory-source.png]()

<!--more-->
#### 区别于工厂方法模式

1. 子工厂必须全部继承或实现自同一个抽象类或接口. 
2. 每个工厂必须包含多个工厂方法. 
3. 每个工厂的方法必须一致

#### 优点
+ 封装性, 每个产品的实现类不是高层模块需要关心的, 它只关心接口和抽象，它不关心对象是如何创建出来。只要知道工厂类是谁，就能创建出来一个需要的对象。
+ 产品族内约束是非公开状态, 是在工厂内实现的。

#### 缺点
产品族扩展非常困难。需要同时修改抽象类和实现类.

#### 使用场景
一个对象族都有相同的约束，就可以使用抽象工厂模式. 比如 php 在 linux 和 windows 下面的运行效果看上去一样，也就是相当于有一样的约束条件: 操作系统类型。那么就可以使用抽象工厂模式, 产生不同操作系统下的 php 安装途径。

#### PHP 实现

```php
<?php

abstract class population {}
abstract class income {}

class ShenzhenPopulation {}
class ShenzhenIncome {}
class BeijingPopulation {}
class BeijingIncome {}

interface NationalStatisticsAbstractFactory {
    public function statisticsPopulation();
    public function statisticsIncome();
}

class ShenzhenFactory implements NationalStatisticsAbstractFactory {
    public function statisticsPopulation() {
        return new ShenzhenPopulation();
    }

    public function statisticsIncome() {
        return new ShenzhenIncome();
    }
}

class BeijingFactory implements NationalStatisticsAbstractFactory {
    public function statisticsPopulation (){
        return new BeijingPopulation();
    }

    public function statisticsIncome () {
        return new BeijingIncome();
    }
}
```
深圳工厂和北京的工厂类(ShenzhenFactory, BeijingFactory)都继承自 国家统计抽象接口(NationalStatisticsAbstractFactory), ShenzhenFactory 和 BeijingFactory 都分别包含统计收入(statisticsIncome)和统计人口(statisticsPopulation)的方法.

## 0x01 小结
设计模式要细细品尝, 值得花时间研究.

<!--more-->
