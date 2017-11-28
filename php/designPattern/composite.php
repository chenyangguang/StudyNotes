<?php

// 抽象构件
abstract class Component {
    public function doSth() {}
}

// 树枝构件
class Composite extends Component {
    private $compArr = [];
    public function add(Component $_component)
    {
        array_push($this->compArr, $_component);
    }

    public function remove(Component $_component)
    {
        $key = array_search($_component, $this->compArr);
        if (!$key !== false) {
            array_splice($this->compArr, $key, 1);
        }
    }

    public function getChildren()
    {
        return $this->compArr;
    }
}

// 叶子构件
class Leaf extends Component {
    public function doSth()
    {}
}

class Client {
    public static function main()
    {
        $root = new Composite();
        $root->doSth();
        $branch = new Composite();
        $root->add($branch);
        $leaf = new Leaf();
        $branch->add($leaf);
    }
    public static function showTree(Composite $root)
    {
    }
}

