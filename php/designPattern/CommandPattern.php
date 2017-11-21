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