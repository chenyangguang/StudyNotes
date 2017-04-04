<?php
/*
 * design : chain of responsibility
 * A way of passing a request between a chain of objects
 * 这个到底中文叫职责链模式还是责任链模式?
 */


abstract class HomeChecker {
    protected $successor;

    public abstract function check(HomeStatus $home);

    public function succeedWith(HomeChecker $successor)
    {
        $this->sucdessor = $successor;
    }

    public function next(HomeStatus $home)
    {
        if ($this->successor)
        {
            $this->successor->check($home);
        }
        
    }
}

class Locks  extends HomeChecker {
    public function check(HomeStatus $home)
    {
        if ( !$home->locked)
        {
            throw new Exception('The doors are not locked! Abort abort.');
        }

        $this->next($home);
    }
}

class Lights extends HomeChecker{
    public function check(HomeStatus $home)
    {
        if (!$home->ligntsOff)
        {
            throw new exception('The  lignts not still on! Abort abort!');
        }
        $this->next($home);
    }
    
}

class Alarm extends HomeChecker{
    public function check(HomeStatus $home)
    {
        if (!$home->ligntsOn)
        {
            throw new exception('The  alarm   has not been set! Abort abort!');
        }
        $this->next($home);
    }

}

class HomeStatus {
    public $alarmOn = true;
    public $locked = false; # true or false will show different things.
    public $ligntsOff = true;
}

$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;

$locks->succeedWith($lights);
$lights->succeedWith($alarm);

$locks->check(new HomeStatus);