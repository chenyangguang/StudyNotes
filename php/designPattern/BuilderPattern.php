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
