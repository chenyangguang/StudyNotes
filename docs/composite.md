---
title: 设计模式-组合模式
date: 2017-11-28 19:14:47
tags:
- 设计模式
---

# 0x00 组合模式
组合模式，即合成模式．

## 定义
**Compose objects into tree structures to represent part-whole hierarchies. Composite lets clients treat individual objects and compositions of objects uniformly.(将抽象对象组合成树形结构以表示＂部分－整天＂的层次结构，使得用户对单个对象和组合对象的使用具有一致性．)**

## 关键角色
+ Component 抽象构件, 定义参加组合对象的共有属性和方法, 可以定义一些默认的属性或行为．
+ Leaf 叶子构件, 叶子对象，无剩余分支, 属于遍历的最小单位．
+ Composite 树枝构件, 树枝对象，组合树枝节点和叶子节点形成一个树形结构．

## 优点
+ 高层模块调用简单, 一棵树形机构中的所有节点都是 Component, 局部和整体对调用者来说没有区别。即高层模块无需关心自己处理的是单个对象还是整个组合结构，简化了高层模块的代码。
+ 节点自由增加
如果想增加一个树枝节点，树叶节点，只要找到它的父节点即可。容易扩展。

## 缺点
树叶和树枝直接使用了实现类，限制了接口的使用范围．

## 使用场景
+ 维护和展示"部分-整体"关系的场景，诸如树形菜单，文件和文件夹管理．
+ 从一个整体中能够独立出部分模块或功能的场景．

## php实现
```
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

```
# 0x 小结
不管你在不在, 设计方式就在那里......

