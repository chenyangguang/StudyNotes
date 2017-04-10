<?php

interface Subject {
    public function attach($observable);
    public function detach($observer);
    public function notify();
}

interface Observer {

    public function handle();
}

// class Auth implements Subject {
//     protected $observers =  [];

//     public function attach(Observer $observer)
//     {
//         $this->observers[] = $observer;
//     }
//     public function detach($observer)
//     {
//         unset($this->observers[$index]);
        
//     }
//     public function notify()
//     {
//         foreach ($this->observers as $observer)
//         {
//             $observer->handle();
//         }
//     }
// }

class Login implements Subject {
    protected $observers =  [];

    // public function attach(Observer $observer)
    // {
    //     $this->observers[] = $observer;

    //     return $this;
    // }


    public function attach($observable)
    {
        if (is_array($observable))
        {
            return $this->attachObservers($observable);
        }

        $this->observers[] = $observable;

        return $this;
    }

    public function detach($observer)
    {
        unset($this->observers[$index]);
        
    }
    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->handle();
        }
    }

    private function attachObservers($observable)
    {
        foreach ($observable as $observer)
        {
            if (!$observer instanceof Observer)
                throw new Exception;

            $this->attach($observer);
        }

        return;
    }

    public function fire()
    {
        $this->notify();
    }
}

// class Log implements Subject {
//     protected $observers =  [];

//     public function attach(Observer $observer)
//     {
//         $this->observers[] = $observer;
//     }
//     public function detach($observer)
//     {
//         unset($this->observers[$index]);
        
//     }
//     public function notify()
//     {
//         foreach ($this->observers as $observer)
//         {
//             $observer->handle();
//         }
//     }
// }

class LogHandler implements Observer {
    public function handle()
    {
        var_dump('Log something important');
    }
}
class BikeFreeNotifier implements Observer {
    public function handle()
    {
        var_dump('ride bike for free on Sunday!');
    }
}
class FreeDeposit implements Observer {
    public function handle()
    {
        var_dump('No need Deposit for youbike and Bluegogo.');
    }
}

$login = new Login;
// $login->attach(new LogHandler);
$login->attach([
    new LogHandler,
    new BikeFreeNotifier,
    new FreeDeposit
]);
$login->fire();