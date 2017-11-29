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