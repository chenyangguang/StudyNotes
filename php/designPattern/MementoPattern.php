<?php
/*
 * Memento Pattern
 */

// 发起人
class Originator {
    private $state;

    public function getState()
    {
        return $this->state;
    }

    public function setState($_state)
    {
        $this->state = $_state;
    }

    // 新建备忘录
    public function createMemento()
    {
        return new Memento($this->state);
    }

    // 备忘录恢复
    public function restoreMemento(Memento $_memento)
    {
        $this->setState($_memento->getState());
    }
}

// 备忘录角色
class Memento {
    private $state;

    public function __contruct($_state)
    {
        $this->state = $_state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($_state)
    {
        $this->state = $_state;
    }
}

// 备忘录管理者
class Caretaker {
    private $memento;

    public function getMemento()
    {
        return $this->memento;
    }

    public function setMemento(Memento $_memento)
    {
        $this->memento = $_memento;
    }
}

class Client {
    public static function main()
    {
        $originator = new Originator();
        $caretaker = new Caretaker();
        $caretaker->setMemento($originator->createMemento());
        $originator->restoreMemento($caretaker->getMemento());
    }
}

