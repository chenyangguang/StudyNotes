<?php
/*
 * 建造者模式
 */

// 产品类
class Product {
    public function doSomething(){}
}

// 抽象建造者
abstract class Builder {
    abstract function setPart();
    abstract function buildProduct(Product $sth);
}

class PissaBuilder extends Product {
    public function setPart() {}
}
