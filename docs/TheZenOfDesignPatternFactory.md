---
title: 设计模式-工厂方法模式
date: 2017-10-23 06:31:49
tags:
- 读书笔记
- 笔记
---

设计模式第二式--工厂方法模式, 改模式使用的频率非常高。所以排在前面一点学。

##  0x00 工厂方法模式

### 定义
  *Define an interface for crating an object, but let subclasses decide which class to instantiate. Factor Method lets a class defer instantiation to subclasses.* 		 + *Separate the construction of a complex object from its representation so the same construction can create different representation* 
 - (定义一个用于创建对象的接口，让子类决定实例化哪一个类。工厂方法使一个类的实例化延迟到其子类。)

<!--more-->

#### 解读
具体的产品类可以有很多个，都继承于抽象产品类。
抽象工厂类负责定义产品对象的产生。
具体如何创建一个产品的对象，是由具体的工厂类实现的。

#### 优点
1. 良好的封装性，代码结构清晰。一个对象创建是有条件约束的，如一个调用者需要一个具体的产品对象，只要知道这个产品的类名即可。无须知道创建对象的艰辛过程，降低模块间的耦合。
2. 工厂方法模式的易扩展性。在增加产品类的情况下，只要适当地修改具体的工厂类或扩展一个工厂类，就可以实现“拥抱变化”。
3. 屏蔽产品类。因为产品类的实例化由工厂类负责，调用者不需关心产品类的实现如何变化，只关心产品的接口。接口不变，系统中的上层模块就不用发生变化。比如: 使用工厂方法模式连接数据库, MySQL 切换到 Oracle 只需要切换驱动名称即可。
4. 解藕框架。

#### 使用场景
1. 工厂方法模式是 new 一个对象的替代品，如果增加一个工厂类并没有增加代码的复杂度，在需要生成对象的地方都可以使用。
2. 灵活的、可扩展的框架可以采用工厂方法模式。万物皆对象。比如: http, udp协议的连接方法中就可以使用．
3. 工厂方法模式可以用在异构项目中．
4. 可以使用在测试驱动开发的框架下．

#### 扩展
1. 缩小为简单工厂模式．去掉抽象类, 并使用 static　关键字．
2. 升级为多个工厂类．
3. 替代单例模式.　单例模式核心要求是内存中只有一个对象，通过工厂方法模式就可以只在内存中生产一个对象．
4. 延迟初始化．一个对象被消费完毕后，并不立刻释放，工厂类保持其初始状态，等待再次被使用．

## 0x01 小结
工厂方法模式暂时理解为，你给我一个物品名，丢给车间, 完成生产．
<!--more-->
