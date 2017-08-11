<?php
/*
  观察者模式
 */
class Interview implements \SplSubject {
    private $name;
    private $observers = [];
    private $content;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(\SplObserver $observer)
    {
        $key = array_search($observer, $this->observers, true);
        if($key) {
            unset($this->observers[$key]);
        }
    }

    public function youCanYouUp($content)
    {
        $this->content = $content;
        $this->notify();
    }

    public function getContent()
    {
        return $this->content . " ({$this->name})";
    }

    public function notify()
    {
        foreach($this->observers as $value) {
            $value->update($this);
        }
    }
}

class Interviewee implements \SplObserver {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function update(\SplSubject $subject)
    {
        echo $this->name . ' 您的面试结果是 <b>' . $subject->getContent() . '</b></br>';
    }
}

$meitu = new Interview('Meitu');
$cyg = new Interviewee('chenyangguang');
$abiao = new Interviewee('abiao');

$meitu->attach($cyg);
$meitu->attach($abiao);
$meitu->detach($abiao);

$meitu->youCanYouUp('面试通过了');
$meitu->youCanYouUp('面试挂了');
