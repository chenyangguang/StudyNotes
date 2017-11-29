---
title: 设计模式-观察者模式
date: 2017-11-29 09:12:26
tags:
- 设计模式

---
# 0x00 观察者模式
也可称发布订阅模式(Publish/Subscribe).

## 定义
**Define a one-to-many dependency between objets so that when one object changes state, all its dependents are notified and updated automatically.(定义对象间一对多的依赖关系，使得每当一个对象改变状态，则所有依赖于它的对象都会得到通知并自动更新．)**
<!--more-->

## 角色
+ Subject 被观察者, 必须能够动态地增加和取消观察者，起到观察观察者并通知观察者的职责.
+ Observer 观察者, 观察者接受到消息通知后，进行更新．
+ ConcreteSubject 具体被观察者, 定义被观察者自已的业务逻辑，同时定义对哪些事件进行通知．
+ ConcreteObserver 具体观察者, 每个具体观察者自己的处理逻辑．

## 优点
* 抽象耦合观察者和被观察者之间的关系, 使之易于扩展．
* 建立一套触发机制．

## 缺点
多级触发时，效率变差．

## php 实现
```
<?php
/*
 * observer pattern
 */

//被观察者
abstract class Subject {
    private $observers = [];
    public function addObserver(Observer $_observer)
    {
        array_push($this->observers, $_observer);
    }

    public function delObserver(Observer $_observer)
    {
        $key = array_search($this->observers, $_observer);
        if ($key !== false) {
            array_splice($this->observers, $key, 1);
        }
    }

    // 通知所有观察者
    public function notifyObservers()
    {
        foreach($this->observers as $observer) {
            $observer->update();
        }
    }
}


// 具体被观察者
class ConcreteSubjects extends Subject {
    public function doSth()
    {
        parent::notifyObservers();
    }
}

// 观察者接口
interface Observer {
    public function update();
}


class ConcreteObserver implements Observer {
    public function update()
    {
        echo "Get it!Yes!Sir!";
    }
}

class Client {
    public static function main()
    {
        $subject = new ConcreteSubjects();
        $observers = new ConcreteObserver();
        $subject->addObserver($observers);
        $subject->doSth();
    }
}
(new Client())::main();
```
## 用武之地
* 可拆分的非组合的关联行为场景.
* 事件多级出发场景．
* 跨系统的消息交换场景，如消息队列的处理机制．

# 0x01 小结
观察者模式需要重点解决两个问题: 
+ 广播链, 在一个观察者模式中，最多出现一个对象既是观察者也是被观察者，即消息最多转发一次(转发两次)是比较恰当的好控制的．
+ 异步处理, 需要考虑线程安全和队列．

<!--more-->
