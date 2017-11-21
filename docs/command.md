---
title: 设计模式-命令模式
date: 2017-11-21 07:12:12
tags:
- 设计模式
---

# 0x00 命令模式

## 定义

**命令模式是一个高内聚的模式，其定义为: Encapsulate a request as an object, there by letting you parameterize clients with different requests, queue or log requests, and support undoable oerations.**
(将一个请求封装成一个对象，从而让你使用不同的请求把客户端参数化，对请求队列或者记录请求日志，可以提供命令的撤销和回复功能。)

## 通用类

包含三个角色: 
+ Receive 接受这角色, 命令传递到这里被执行。
+ Command 命令角色, 声明需要执行的所有命令。
+ Invoker 调用者角色, 接受到命令，并执行命令。

## php 实现

```
<?php
/*
  command pattern
 */

// 通用的 Receiver 类
abstract class Receiver {
    abstract function dosth();
}

// 具体的 Receiver 类
class ConcreteReceiver1 extends Receiver  {
    public function doSth() {
    }
}

class ConcreteReceiver2 extends Receiver {
    public function doSth() {

    }
}

// 抽象的Command 类
abstract class Command {
    abstract function execute();
}

// 具体 Command 类
class ConcreteCommand1 extends Command {
    private $receiver;

    public function ConcreteCommand1(Receiver $_receiver) {
        $this->receiver = $_receiver;
    }

    public function execute() {
        $this->receiver->doSth();
    }
}

class ConcreteCommand2 extends Command {
    private $receiver;

    public function ConcreteCommand2(Receiver $_receiver) {
        $this->receiver = $_receiver;
    }

    public function execute() {
        $this->receiver->doSth();
    }
}

// 调用者 Invoker 类
class Invoker {
    private $command;

    public function setCommand(Command $_command) {
        $this->command = $_command;
    }
    public function act() {
        $this->command->execute();
    }
}

// 场景调用
class client {
    public static function main() {
        $invoker = new Invoker();
        $receiver = new ConcreteReceiver1();
        $command = new ConcreteCommand1($receiver);
        $invoker->setCommand($command);
        $invoker->act();
    }
}
```

# 0x01 小结
切勿好高骛远, 即使你的征途是星辰大海, 也要脚踏实地做好准备工作。
