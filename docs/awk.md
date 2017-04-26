---
title: 瑞士军刀片 awk
date: 2017-04-25 19:22:27
tags:

- 灵犀指
---


###  awk 起源之美女选男朋友

说起瑞士军刀，可能很多人都听腻了。 有说 Emacs 是瑞士军刀的， 有说 Vim 也是瑞士军刀， 有说 Python 是瑞士军刀的。但是让我们暂时抛开对瑞士军刀的兴趣, 来拨弄一下一页小小的瑞士军刀片-- awk。这个小家伙是一门小巧玲珑的特殊的编程语言。
<!--more-->
 
不可我， 总结了一个最好的认识新事物的方法: 迎面冲上去。
看下面这组相亲数据 gfs.data : 
 
```
Li 65 177 10000
Wang 77 180 8000
Niu 60 199  20000
Chen 64.5 168 5000
Ouyang 80 200 12000
Liu 72.5 182 9999
```

这片小数据里面包含几个字段， 人名，体重，身高, 月收入的数据。 比如美女需要从这里挑选男朋友标准，怎么选出这里面身高 177 以上的高富帅呢？ 

```
➜  tmp awk ' $3 > 177 { print $1,$3}' gfs.data 
Wang 180
Niu 199
Ouyang 200
Liu 182
```

 tmp 是临时目录，这个是 zsh 里面的一个短路径，略过。 awk 程序的结构是 *pattern { action }* 的结构。
它会默认将字段看作非空白字符组成的序列。（所以你看那些中间的安安静静的空格，被当成是空气了。）剩下的，第一个字段姓名，就是 *$1*, 第二个体重是 *$2*, 177， 180, 199, 168, 200,182这些身高值就是 *$3*了, 依次类推下去。 整个一行是 $0。每个人的颜值，身家是可能不一样的, 也就是说 *$n* 的值长度是不一定一致的。

 单引号包起来的 *$3 > 177* 是对每行扫描匹配的条件。当扫到 Wang 时， 很明显这家伙 180 超出预期值，需要多瞄几眼，看是否是 "八字" 合的来的真名天子，被挑出来了。按照这个模式一直搜到最后行， Liu 这个哥儿们也中彩了。
如果这位美女眼光比较高，她找男朋友的条件比较多，比如，收入要高，体重要匀称，智商要高等， 这样的话，最好是将她的条件给写到一个文件里面去， 名值曰: conditions.data。一次给她选中得意郎君。

```
awk -f conditions.data gfs.data
```

*-f* 表示从文件中提取程序，这个标准可以给多个姑娘参考, 选, 不中？不要， 中？ 要得！ 选.....选.....海选!

```
awk -f progfile optionnal list of files
```

那么选择的条件一多了， 不想一条条罗列了，怎么给婚介所一个范围？ 用到字段的数量 *NF* 了。 *NF* 是 *Awk* 计算当前行的字段数量并存储的内建的变量。

```
➜  tmp awk  '{ print NF, $1, $NF }' gfs.data 
4 Li 10000
4 Wang 8000
4 Niu 20000
4 Chen 5000
4 Ouyang 12000
4 Liu 9999
```
这就打出每一个 boy 的 考察的条件数量，姓名，月收入了。直接拿这条件去撒网了。

打印真名天子所在的相亲次序 *NR*, 也是一个内建变量，是计算到目前为止，读取到的行的数量, 这里就是相亲的次数（假设这妹子每次相亲都换人）。

```
➜  tmp awk '{print NR, $0}'  gfs.data
1 Li 65 177 10000
2 Wang 77 180 8000
3 Niu 60 199  20000
4 Chen 64.5 168 5000
5 Ouyang 80 200 12000
6 Liu 72.5 182 9999

```

这几个的条件呢？ 

```
➜  tmp awk '$4 > 10000 {print "很有钱的人:", $1, " 月收入:", $4 }' gfs.data  
很有钱的人: Niu  月收入: 20000
很有钱的人: Ouyang  月收入: 12000
```

人太多了，薪资位数不好比较，毕竟 0 太多了嘛! 筛选一下并格式化一下， 怎么搞？ printf(format, val_1, val_2, val_3, ..., val_n), 

```
➜  tmp awk '{printf("%-8s 的月薪是 ￥%10.2f\n", $1,$4)}' gfs.data
Li       的月薪是 ￥  10000.00
Wang     的月薪是 ￥   8000.00
Niu      的月薪是 ￥  20000.00
Chen     的月薪是 ￥   5000.00
Ouyang   的月薪是 ￥  12000.00
Liu      的月薪是 ￥   9999.00

```

哎呀，还是看不清谁是优质男嘛，来，排下他们的薪资高低。 薪水往地处走，人往高处挑呀！ 用管道命令 *sort* 。

```
➜  tmp awk '{printf(" %10.2f %s\n", $4, $0)}' gfs.data | sort -n
    5000.00 Chen 64.5 168 5000
    8000.00 Wang 77 180 8000
    9999.00 Liu 72.5 182 9999
   10000.00 Li 65 177 10000
   12000.00 Ouyang 80 200 12000
   20000.00 Niu 60 199  20000
```
原来牛哥是这里边最有 "钱途" 的！ 既然有三个是万元薪资的了，就先锁定他们了。毕竟谁会跟钱过不去？但是不能光看工资啊，要是这人是武大郎怎么办或者√2怎么办？ 不行，还是慎重一点，高开低走，190以上的，能过眼。长大了能像郎平和朱婷一样打排球，或者弄个小姚明？ 再加点条件吧： AND, OR 和 NOT, 用 &&, || 和 !

```
➜  tmp awk '$4 >=10000 && $3 > 190 { print $0}' gfs.data
Niu 60 199  20000
Ouyang 80 200 12000
```

这个输出少了一个醒目的标题, 说不定有妹子错将体重看成是腰围呢？为避免不必要的误解发生，还是加个头吧。
```
➜  tmp awk 'BEGIN {print "姓名 体重 身高 薪水"; print ""}{print($0)}' gfs.data        
姓名 体重 身高 薪水

Li 65 177 10000
Wang 77 180 8000
Niu 60 199  20000
Chen 64.5 168 5000
Ouyang 80 200 12000
Liu 72.5 182 9999

```

哎呀，提前到约会地点了，闲着没事干，要么比较一下这些人的平均工资？

```
➜  tmp awk '{salary = salary + $4} END {print NR, "个人";  print "总共月薪：", salary; print "平均月 薪:", salary/NR}' gfs.data        
6 个人
总共月薪： 64999
平均月薪: 10833.2
```
还不错嘛！人还没来，将所有相亲的人名品起来能组成一首诗么？ 

```
➜  tmp awk '{names = names $1 " "} END {print names }'  gfs.data
Li Wang Niu Chen Ouyang Liu 
```

好吧，并没有。这些人名有多少笔画?啊不，是有几个字母组成？ 

```
➜  tmp awk ' {print $1, length($1) } ' gfs.data
Li 2
Wang 4
Niu 3
Chen 4
Ouyang 6
Liu 3
```


### 军刀的流程


if-else 筛筛 

```
➜  tmp awk '$4 > 10000 {n =  n + 1; salary = salary + $4 }{ if (n > 0 && $4 > 10000)  print $1, "你有戏哟"; else {print $1, "你被out了"} }' gfs.data
Li 你被out了
Wang 你被out了
Niu 你有戏哟
Chen 你被out了
Ouyang 你有戏哟
Liu 你被out了
```

while 循环, 从头梳理一边
```
awk '{ line[NR] = $0 } END { i = NR ;while (i>0) { print line[i]; i = i - 1 }} ' gfs.data
Liu 72.5 182 9999
Ouyang 80 200 12000
Chen 64.5 168 5000
Niu 60 199  20000
Wang 77 180 8000
Li 65 177 10000
```

for  九九归一
```
➜  tmp awk 'BEGIN {for (i=1; i <=9; ++i) print i}'                            
1
2
3
4
5
6
7
8
9

```

### 实用“片刀式”

输入行的总行数

```
➜  tmp awk 'END { print NR}' gfs.data
6
```

打印第四行 

```
➜  tmp awk ' NR == 4 ' gfs.data
Chen 64.5 168 5000
```

输出每一行最后一个字段 

```
➜  tmp awk ' {print $NF}' gfs.data
10000
8000
20000
5000
12000
9999
```

打印最后一行的最后一个字段

```
➜  tmp awk '{field = $NF} END { print field }'  gfs.data
9999
```

打印字段数多于 3 个的输入行

```
➜  tmp awk 'NF>3' gfs.data
Li 65 177 10000
Wang 77 180 8000
Niu 60 199  20000
Chen 64.5 168 5000
Ouyang 80 200 12000
Liu 72.5 182 9999
```

打印最后一个字段值大于10000的输入行

```
➜  tmp awk '$NF > 10000 ' gfs.data 
Niu 60 199  20000
Ouyang 80 200 12000

```

打印所有输入行的字段数的总和

```
➜  tmp awk ' {nf = nf + NF} END {print nf} ' gfs.data
24
```

打印包含 /Niu/ 的行的数量

```
➜  tmp awk ' /Niu/ {nlines = nlines + 1} END {print nlines}' gfs.data
1

```

打印具有最大值的第4个字段，以及包含它的行(假设 $1 总是正的)

```
➜  tmp awk '$4 > max { max=$4; maxline=$0 } END { print max, maxline }' gfs.data 
20000 Niu 60 199  20000
```

打印至少包含一个字段的行

```
➜  tmp awk 'NF > 0' gfs.data
Li 65 177 10000
Wang 77 180 8000
Niu 60 199  20000
Chen 64.5 168 5000
Ouyang 80 200 12000
Liu 72.5 182 9999
```

打印长度超过 20 个字符的行 
```
➜  tmp awk 'length($0) > 16' gfs.data
Niu 60 199  20000
Chen 64.5 168 5000
Ouyang 80 200 12000
Liu 72.5 182 9999
```

每一行的前面加上它的字段数 
```
➜  tmp awk '{print NF, $0}'  gfs.data
4 Li 65 177 10000
4 Wang 77 180 8000
4 Niu 60 199  20000
4 Chen 64.5 168 5000
4 Ouyang 80 200 12000
4 Liu 72.5 182 9999
```

打印每行第二，第一字段

```
➜  tmp awk '{print $2, $1}' gfs.data
65 Li
77 Wang
60 Niu
64.5 Chen
80 Ouyang
72.5 Liu
```

交换一个字段并打印整行

```
➜  tmp awk '{tmp = $1; $1 = $2; $2 = tmp; print}' gfs.data
65 Li 177 10000
77 Wang 180 8000
60 Niu 199 20000
64.5 Chen 168 5000
80 Ouyang 200 12000
72.5 Liu 182 9999

```

每行的第一个字段用行号代替

```
➜  tmp awk  '{$1 = NR; print}' gfs.data
1 65 177 10000
2 77 180 8000
3 60 199 20000
4 64.5 168 5000
5 80 200 12000
6 72.5 182 9999

```

打印删除了第二个字段的行

```
➜  tmp awk '{$2 == ""; print}' gfs.data
Li 65 177 10000
Wang 77 180 8000
Niu 60 199  20000
Chen 64.5 168 5000
Ouyang 80 200 12000
Liu 72.5 182 9999
```

每一行的字段按逆序打印

```
➜  tmp awk '{ for (i=NF; i > 0; i= i-1) {printf("%s ", $i)} printf("\n")}' gfs.data
10000 177 65 Li 
8000 180 77 Wang 
20000 199 60 Niu 
5000 168 64.5 Chen 
12000 200 80 Ouyang 
9999 182 72.5 Liu 

```

打印每一行的所有字段值之和

```
➜  tmp awk '{sum = 0; for (i=1; i <=NF; i=i+1) {sum = sum + $i} print sum }' gfs.data
10242
8257
20259
5232.5
12280
10253.5
```

将所有行的所有字段值累加起来 

```
➜  tmp awk  '{for (i=1; i<=NF; ++i) sum += $i} END {print sum}' gfs.data
66524
```

将所有行的所有字段值的绝对值 

```
➜  tmp awk  '{for (i=1; i<=NF; ++i) if ($i < 0) {$i = -$i} print }'                  
Li -65 -177 18000 # 这里手动输入带负数的值
Li 65 177 18000 # 返回

```

### 刀片出鞘
一枝军刀片，千军万马削倒一遍!
欲知后事如何，且听不才我下回分解。。。。。。


<!--more-->
