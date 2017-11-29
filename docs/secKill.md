---
title: 秒杀场景小结
date: 2017-11-08 20:53:00
tags:
- Web
- 计算机技术
---

即使看过秒杀场景的处理办法，还是会忘，因为没有真正实战过．总得抽时间总结一下这个场景的应对策略．那天就需要处理这块业务呢？以防一般的 bug 在那时顶风作案.

## 0x00 那山，那人，那秒杀
<!--more-->
秒杀场景通常发生在活动日, 节假日促销，"双十一", 春运火车票抢购等. 此时,　一般是月黑风高, Bug 容易趁机做乱之时．

<!-- 但是根本上, bug能顶风作案的 -->

秒杀开始之前，先来欣赏一段<<亮剑>>李云龙攻打县城的场景, 当时日方从四面八方往平安县城增援时, 丁伟所在的防区的阻击方式很是巧妙: 

一开始没搞懂增援的敌人是干啥时, 丁伟的策略是: "一线部队放过敌人的骑兵, 全力阻击敌人的步兵， 二线部队务将敌人的骑兵拦截在二道河口".　然后发现敌人不顾一切地要奔赴县城时，他明白了，这伙部队是下了死命令往县城奔啊！如果硬抗，肯定是伤亡惨重啊，但是又不能撤出部队，让敌军从防区里过去．亮点来了, 下了四道命令: 

1. 发动地方武装和民兵, 沿公路线及公路两侧埋设地雷, 密度要大;
2. 派出小部队，占据公路沿线的隘口和制高点, 节节抗击．迟缓敌人的进攻锋芒;
3. 炸毁防区内所有的桥梁;
4. 前沿部队撤出阵地，让开路口，让敌人进来．采用麻雀战，袭扰敌人．

"原则就只有一个，不惜一切代价，阻敌增援."
 
 这不就是活生生的秒杀现场吗！下单的人就是"日军"，不顾死活的都狂点狂刷剩下的库存, 提交表单, 奔赴"县城(数据库)"! 买!买!买!但是你说我网站能让你轻易从我"防区"过去么？那么怎么阻击经过我秒杀系统的场景＂防区＂呢?或者说怎么设计和优化我防区的阻击能力呢？

###  现场特点

1. 大量用户在同一时间发起进攻, 造成瞬时的高流量.
2. 访问量远远大于库存量．
3. 业务流程就是下单并减库存.

### 针对性的架构

秒杀页面->服务器站点->服务层->数据库层
+ 秒杀页面 
  1. 静态化，在秒杀页面，就得将页面静态化, 除了必要的静态元素，其余的全部静态化，结合 CDN抵抗页面静态元素的访问．
  2. 禁止用户重复提交, 提交过后按钮置为不可点击或者灰色.
  3. 用户限流, 同一个IP用户一定时间内只允许提交一次订单.
  4. 验证码填写识别.
+ 服务器站点: 
  1. 限制用一个 UID 用户一段时间内的访问次数．
  2. 采用消息队列缓存请求, 批量读取, 把多个请求的查询合并到一起进行, 减少数据库的访问次数．
  3. redis 缓存查询的结果, 特别是库存量．
+ 服务层
  1. 分时分段分批次放票, "骑兵", "步兵"梯队放过处理．
  2. 下订单模块(秒杀的核心部分), 队列控制异步化，做请求队列，判断读列是否已经满, 若未满，则将请求放到队列中;若已满, 则后面的请求返回秒杀失败. 总之, 单位时间只透过有限的"部队"(请求)去"县城"(数据库).
  3. 下单, 异步付款．

### 关键点
1. 业务拆分, 独立并发访问.
2. 高并发控制，请求量拦截．
3. 读写分离(查询和下单拆分独立).
4. 请求队列控制接受数，控制并发量.
5. 订单和支付保持一致性．


## 0x01 让暴风雨来的更猛烈些吧

要点是层层阻击, 将流量压力拦在上游．减少到达写入数据库的增援部队数量．
留给中国队的时间已经不多了，哦不，是留给 Bug 的时间已经不多了, 又错了，是留给增援到数据库的"敌军"(写操作)已经不多了......

## 0x02 参考

1. [秒杀系统架构优化之路.58沈剑](https://mp.weixin.qq.com/s?sn=fb28fd5e5f0895ddb167406d8a735548&__biz=MjM5ODYxMDA5OQ==&mid=2651959391&idx=1&scene=21&pass_ticket=5a1eixuRcaxaEfBB3VPh7z%2BRHowhFEJSqSWxYJTsomcQQ1yIU7LMGpQxjDey9Xgj)
2. [如何设计一个秒杀系统](http://blog.csdn.net/suifeng3051/article/details/52607544)
3. [Web系统大规模并发--电商秒杀与抢购.徐汉彬](http://www.csdn.net/article/2014-11-28/2822858)
<!--more-->
