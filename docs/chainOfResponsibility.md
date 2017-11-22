---
title: 设计模式-责任链模式
date: 2017-11-22 10:18:40
tags:
- 设计模式
---

# 0x00 责任链模式

## 定义
**Avoid coupling the sender of a request to its rceiver by giving more than one object a chance to handle the request. Chain the receiving objects and pass the request along the chain until an object handles it.(使多个对象都有机会处理请求，从而避免了请求的发送者和接受者之间的耦合关系。将这些对象连成一条链，并沿着这条链传递该请求，直到有对象处理它为止。)**

<!--more-->

## 重点
其重心和核心都在“链”上，有一条链去处理相似的请求在链中决定谁来处理这个请求，并返回相应的结果，多个具体处理者 ConcreteHandler 组成了责任者模式的核心"链"。

## 优点
将请求和处理分开。请求者只需递交请求到窗口，不关心谁在处理，而处理者只关心自己的处理部分，然后提交下一级处理者，直至结束。灵活解耦。

## 缺点
+ 性能, 每个请求从链头遍历到链尾, 当链较长时，性能会有问题。
+ 调试，这个是否只能二分断点排查了。。。。。。

## 留意
对链的节点数量进行限制，避免超长链的现象发生。可在 setNext()方法中判断

## php 实现

```
<?php
abstract class Handler {
    private  $nextHandler;
    public final function job(Request $_request) {
        $reponse = null;
        if ($this->getEmerLevel() == $_request->getRequestLevel()) {
            $response = $this->report($_request);
        } else {
            if ($this->nextHandler != null) {
                $response = $this->nextHandler->job($_request);
            }
        }
        return $response;
    }

    public function setNext(Handler $_handler) {
        $this->nextHandler = $_handler;
    }

    // 处理紧急程度
    abstract function getEmerLevel();

    // 处理任务
    abstract function report();
}

class Level {

}

class Request  {
    public function getRequestLevel() {
        return null;
    }
}

class Response {

}

// 三个具体处理者
class ConcreteHandler1 extends Handler {
    protected function report(Request $_request) {
        return null;
    }

    protected function getEmerLevel() {
        return null;
    }
}

class ConcreteHandler2 extends Handler {
    protected function report(Request $_request) {
        return null;
}

    protected function getEmerLevel() {
        return null;
    }
}
class ConcreteHandler3 extends Handler {
    protected function report(Request $_request) {
        return null;
    }
    protected function getEmerLevel() {
        return null;
    }
}

// 场景类
class Client {
    public static function main() {
        $handler1 = new ConcreteHandler1();
        $handler2 = new ConcreteHandler2();
        $handler3 = new ConcreteHandler3();
        $handler1->setNext($handler2);
        $handler2->setNext($handler3);
        $res = $handler1->job(new Request());
    }
}
```
# 0x01 小结
在责任者模式的核心是: 发起的一个请求直接投给第一个处理者, 依次传递给下一层处理者，直至最终返回结构, 整个请求的处理过程被屏蔽起来。

<!--more-->
