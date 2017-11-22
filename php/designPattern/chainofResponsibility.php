<?php
/*
 * chain of responsibility pattern
 */
// 抽象处理者
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