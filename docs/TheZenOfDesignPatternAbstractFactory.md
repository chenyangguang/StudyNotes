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
 *Define an interface for crating an object, but let subclasses decide which class to instantiate. Factor Method lets a class defer instantiation to subclasses.* 
 (定义一个用于创建对象的接口，让子类决定实例化哪一个类。工厂方法使一个类的实例化延迟到其子类。)

<!--more-->
#### 区别于工厂方法模式

a)子工厂必须全部继承或实现自同一个抽象类或接口. b)每个工厂必须包含多个工厂方法. c) 每个工厂的方法必须一致


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
