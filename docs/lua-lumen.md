## Lua 入门

最近像系统花几天时间学习 Lua 是因为在看 《redis 实战》的过程中发现 Lua 可与 redis 匹配产生叠加性能。nginx+Lua+redis 的联姻又可以再次增强 redis 的功力。

### 教程
Lua 是用标准 C 语言编写的强大的、开源、轻量级、嵌入式的脚本语言。提供面向过程, 面向对象, 面向函数式, 数据驱动的编程方式。

#### 设计目的
嵌入到应用程序中, 为应用程序提供灵活的扩展和定制功能。

#### 特性
+ 轻量级: 使用标准 C 语言编写并以源码形式开放, 编译后只有 100 多k, 非常便于嵌入到别的程序中。
+ 可扩展: Lua 提供了非常易于使用的扩展接口和机制: 由宿主(通常是 C 或 C++)提供这些功能， 使用起来就像内置的功能一般。
+ 其他特性: 自动内存管理; 提供了一种通用的类型的表(table), 用来实现数组, 哈希表, 集合, 对象; 语言内置模式匹配; 闭包(closure); 函数也可以看作一个值; 提供多线程等。

#### 应用场景
+ 游戏开发
+ 独立应用脚本
+ Web 应用脚本
+ 扩展和数据库插件: MySQL Proxy 和 MySQL WorkBench
+ 安全系统, 如入侵检测系统

#### 安装

```
cd ~
curl -R -O http://www.lua.org/ftp/lua-5.3.0.tar.gz
tar zxf lua-5.3.0.tar.gz
cd lua-5.3.0
make linux test
make install
```

#### 开始 
```
➜  ~ lua -i
Lua 5.2.3  Copyright (C) 1994-2013 Lua.org, PUC-Rio
> print("Hello Lua!")
Hello Lua!
> 
```
并没有诸如 *exit* 的命令退出! 直接 Ctrl + c, 呵。

#### First Blood Demo !

```
➜ touch first-blood.lua
➜ lua echo 'print("hello world lua!")' > first-blood.lua
echo print("hello world lua") > first-blood.lua
➜  lua lua first-blood.lua 
hello world lua!
```

### 来源
+ [Lua官网](https://www.Lua.org/)
+ [Lua 基本入门网上教程](http://www.runoob.com/Lua/Lua-tutorial.html)
+ [github 源码](https://github.com/lua/lua)
+ [Lua wiki tools](http://lua-users.org/wiki/)
