## Lua 入门

最近想系统花几天时间学习 Lua 是因为在看 《redis 实战》的过程中发现 Lua 可与 redis 匹配产生叠加性能。nginx+Lua+redis 的联姻又可以再次增强 redis 的功力。

### 教程

  Lua 是用标准 C 语言编写的强大的、开源、轻量级、嵌入式的脚本语言。提供面向过程, 面向对象, 面向函数式, 数据驱动的编程方式。

### 设计目的

  嵌入到应用程序中, 为应用程序提供灵活的扩展和定制功能。

### 特性

  - 轻量级: 使用标准 C 语言编写并以源码形式开放, 编译后只有 100 多k, 非常便于嵌入到别的程序中。
  - 可扩展: Lua 提供了非常易于使用的扩展接口和机制: 由宿主(通常是 C 或 C++)提供这些功能， 使用起来就像内置的功能一般。
  - 其他特性: 自动内存管理; 提供了一种通用的类型的表(**table**), 用来实现数组, 哈希表, 集合, 对象; 语言内置模式匹配; 闭包(**closure**); 函数也可以看作一个值; 提供多线程等。

### 应用场景

  - 游戏开发
  - 独立应用脚本
  - Web 应用脚本
  - 扩展和数据库插件: MySQL Proxy 和 MySQL WorkBench
  - 安全系统, 如入侵检测系统

### 安装

  ```bash
  cd ~
  curl -R -O http://www.lua.org/ftp/lua-5.3.0.tar.gz
  tar zxf lua-5.3.0.tar.gz
  cd lua-5.3.0
  make linux test
  make install
  ```

### 开始 

```bash
➜  ~ lua -i
Lua 5.2.3  Copyright (C) 1994-2013 Lua.org, PUC-Rio
> print("Hello Lua!")
Hello Lua!
> 
```
并没有诸如 **exit** 的命令退出! 直接 Ctrl + c, 呵。

### First Blood Demo !

``` bash
➜ touch first-blood.lua
➜ lua echo 'print("hello world lua!")' > first-blood.lua
echo print("hello world lua") > first-blood.lua
➜  lua lua first-blood.lua 
hello world lua!
```

### 两种注释方式

```bash
-- single line commentary for lua
--[[
print('multiple')
print('commentary')
]]--
```

### 八种数据类型

+ nil 
+ boolean
+ number, 双精度类型浮点实数
+ string 
+ userdata, 表示任意存储在变量中的 C 数据结构
+ function, 由C 或者 Lua 写的函数
+ thread, 表示执行的独立线路, 用于执行协同程序
+ table, Lua 中的表(table), 其实是个**关联数组**(associative arrays), 数组的索引可以是数字或者字符串。使用**{}**来构造创建。

### 基本

+ **数字**, **字母** 和 **下划线** 构成合法变量, **区分大小写**。
+ 默认变量都是全局的, 使用 **local** 显示声明局部变量。使用前无需声明，默认值是 **nil**, 删除一个变量直接将该变量值致 **nil** 即可。
+ 字符串连接使用 **..** 。
+ **#** 计算字符串长度。
+ 索引从 **1** 开始!
+ **table** 长度不固定, 添加新数据时长度自动增长。未初始化值为 **nil**。
+ **线程** VS **协程**: 线程可以同时运行多个，协程任意时刻只能运行一个，并且出于运行状态的协程只有被挂起(**suspend**)时才会暂停。
+ table 的索引可以使用**[i]**或者 **.** 操作, 如: table1["fix"], table.fix。
+ **^** 和 **..** 是右连接, 其他运算符是左连。

### 循环控制

+ for 循环
+ while
+ repeat ... until
+ break, 跳出当前循环语句, 并执行脚本紧接着的语句。

### 函数

- Lua 函数可以 **return** 多个结果值。
- Lua 函数可以在参数列表中使用 **...** 作为可变参数。
- 函数可以作为参数传递给函数, 有点像 **Lisp** 里面的。

### 运算 

  + 加减乘除求余之外, 特殊的运算符号 **^** 乘幂;
  + 关系运算符号中 **~=** 表示不等于; 
  + 逻辑运算符号三板斧: and, or , not;
  + **..** 号连接, **#** 一元运算符, 返回字符串或表的长度(pirnt(#'abc'))。
  + 运算符优先级排行榜:

  ```
  ^
  not - (unary)
  * /
  + -
  ..
  < > <= >= ~= ==
  and 
  or
  ```

## 参考来源
+ [Lua官网](https://www.Lua.org/)
+ [Lua 基本入门网上教程](http://www.runoob.com/Lua/Lua-tutorial.html)
+ [github 源码](https://github.com/lua/lua)
+ [Lua wiki tools](http://lua-users.org/wiki/)
