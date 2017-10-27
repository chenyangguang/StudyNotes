---
title: 设计模式-建造者模式
date: 2017-10-26 11:14:33
tags:
- 读书笔记
- 笔记
- 设计模式
---

##  0x00 建造者模式

### 定义
 *Define an interface for crating an object, but let subclasses decide which class to instantiate. Factor Method lets a class defer instantiation to subclasses.* 
 (定义一个用于创建对象的接口，让子类决定实例化哪一个类。工厂方法使一个类的实例化延迟到其子类。)
建造者模式(Builder Pattern)也叫生成器模式.
<!--more-->
#### 优点
+ 封装性, 客户端不需要知道产品内部的细节.
+ 建造者独立，容易扩展.
+ 便于控制细节风险, 由于具体的建造者都是独立的，因此对建造过程中的逐步细化，不会影响到其他模块.

#### 使用场景
  * 相同的方法, 不用的执行顺序, 产生不同的h四件结果时，可以采用建造者模式.
  * 多个部件或零件，都可以装配到一个对象中，但是产生的运行结果又不相同的，则可以使用该模式.
  * 产品类非常复杂，或者产品类中的调用顺序不同产生了不同的效果，这个时候使用建造者模式非常合适.

#### 注意
建造者模式关注的是零件类型和装饰工艺(顺序), 这个是它与工厂模式最大不同的地方。

#### PHP 实例

```
<?php
abstract class AbstractQueryBuilder {
    abstract function getQuery();
}

abstract class AbstractQueryDirector {
    abstract function __construct(AbstractQueryBuilder $builder);
    abstract function buildQuery();
    abstract function getQuery();
}

class Model {
    private $sql = NULL;
    private $sql_table = NULL;
    private $sql_where = NULL;
    private $sql_limit = NULL;

    function __construct() {
    }

    function querySql() {
        return $this->sql;
    }

    function table($table) {
        $this->sql_table  = $table;
    }

    function where($where) {
        $this->sql_where = $where;
    }

    function limit ($limit) {
        $this->sql_limit = $limit;
    }

    function splicingQuery () {
        $this->sql = 'SELECT * FROM ';
        $this->sql .= $this->sql_table;
        $this->sql .= ' WHERE ' . $this->sql_where;
        $this->sql .= ' LIMIT ' . $this->sql_limit;
    }
}

class BaseQueryBuilder extends AbstractQueryBuilder {
    private $query = NULL;
    function __construct() {
        $this->query = new Model();
    }

    function table($table) {
        $this->query->table($table);
    }

    function where($where) {
        $this->query->where($where);
    }

    function limit($limit) {
        $this->query->limit($limit);
    }

    function splicingQuery() {
        $this->query->splicingQuery();
    }

    function getQuery() {
        return $this->query;
    }
}

class UserQueryDirector extends AbstractQueryDirector {
    private $builder = NULL;
    public function __construct(AbstractQueryBuilder $builder_sql) {
        $this->builder = $builder_sql;
    }

    public function buildQuery() {
        $this->builder->table('User');
        $this->builder->where('id < 10');
        $this->builder->limit('100');
        $this->builder->splicingQuery();
    }

    public function getQuery() {
        return $this->builder->getQuery();
    }
}

$queryBuilder = new BaseQueryBuilder();
$userDirector = new UserQueryDirector($queryBuilder);
$userDirector->buildQuery();
$userSql = $userDirector->getQuery();

var_dump($userSql->querySql());

// string(42) "SELECT * FROM User WHERE id < 10 LIMIT 100"
```
## 0x01 小结
各个设计模式之间有相似的地方. 比如封装性。
<!--more-->
