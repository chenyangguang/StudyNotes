<?php
/*
 * Iterator Pattern
 */
interface IIterator {
    public function next();
    public function hasNext();
    public function remove();
}

class ConcreteIterator implements IIterator {
    private $arr = [];
    public $cursor = 0;

    public function __construct($_arr)
    {
        $this->arr = $_arr;
    }

    public function hasNext()
    {
        return $this->cursor == count($this->arr) ? false : true;
    }

    public function next()
    {
        $result = null;
        if($this->hasNext()) {
            return ($this->arr)[$this->cursor++];
        }
        return $result;
    }

    // 开发系统时，如果用到迭代器的删除方法，应该完成两个功能: 1. 删除当前元素, 2. 当前游标指向下一个元素．
    public function remove()
    {
        $this->cursor = null;
        return true;
    }
}

interface Aggregate {
    public function add($obj);
    public function remove($obj);
    public function iterator();
}

class ConcreteAggregate implements Aggregate {
    private $arr = [];

    public function add($obj)
    {
        $this->arr[] = $obj;
    }

    public function iterator()
    {
        return new ConcreteIterator($this->arr);
    }

    public function remove($obj)
    {
        $this->remove($obj);
    }
}

class Client {
    public static function main()
    {
        $agg = new ConcreteAggregate();
        $agg->add('test');
        $agg->add('hello');
        $agg->add('world');
        $iterator = $agg->iterator();
        while ($iterator->hasNext()) {
            echo $iterator->next(), PHP_EOL;
        }
    }
}
(new Client())::main();
/*
test
hello
world
*/