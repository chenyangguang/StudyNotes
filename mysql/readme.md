# Mysql Study
## 设置权限

+ grant select,insert,update,delete on library.* to library@localhost Identified by "library";
+ grant select,insert,update,delete on gitvim.* to gitvim@localhost Identified by "gitvim";


+ sum 使用的时候注意先将需要必要的字段分组, 否则将sum(money)计算表内这个字段的总数
+ select sum(money) from in_come group by member_id;

## 分区分表
    + [[http://haitian299.github.io/2016/05/26/mysql-partitioning/][mysql partition]]

## mysql 之 binlog
    + 太可怕了，一定要记得开启 [[http://www.cnblogs.com/martinzhang/p/3454358.html][binlog]]

## mysql 瓶颈分析 之 profile 
    + 开启 profile =set profiling=1=
    + mysql> =show profiles;=
      +----------|------------|-----------------------------+
      | Query_ID | Duration   | Query                       |
      +----------|------------|-----------------------------+
      |        1 | 0.00017675 | SELECT DATABASE()           |
      |        2 | 0.00032450 | show databases              |
      |        3 | 0.00019150 | show tables                 |
      |        4 | 0.00049975 | show tables                 |
      |        5 | 0.00047950 | select * from typecho_users |
      |        6 | 0.00009425 | show profiles for query 5   |
      |        7 | 0.00010075 | show profiles for query 2   |
      +----------|------------|-----------------------------+
    + =show profile for query 3;= 查看第三个 query_id 的详细信息
    + =show profile cpu,block io,memory,swaps,context switches,source for query 8;=

      +--------------------------------|----------|----------|------------|-------------------|---------------------|--------------|---------------|-------|-----------------------|---------------|-------------+
      | Status                         | Duration | CPU_user | CPU_system | Context_voluntary | Context_involuntary | Block_ops_in | Block_ops_out | Swaps | Source_function       | Source_file   | Source_line |
      +--------------------------------|----------|----------|------------|-------------------|---------------------|--------------|---------------|-------|-----------------------|---------------|-------------+
      | starting                       | 0.000021 | 0.000012 |   0.000008 |                 0 |                   0 |            0 |             0 |     0 | NULL                  | NULL          |        NULL |
      | Waiting for query cache lock   | 0.000005 | 0.000003 |   0.000003 |                 0 |                   0 |            0 |             0 |     0 | try_lock              | sql_cache.cc  |         458 |
      | checking query cache for query | 0.000061 | 0.000035 |   0.000026 |                 0 |                   0 |            0 |             0 |     0 | send_result_to_client | sql_cache.cc  |        1568 |
      | checking permissions           | 0.000009 | 0.000004 |   0.000003 |                 0 |                   0 |            0 |             0 |     0 | check_access          | sql_parse.cc  |        4786 |
      | Opening tables                 | 0.000019 | 0.000011 |   0.000009 |                 0 |                   0 |            0 |             0 |     0 | open_tables           | sql_base.cc   |        4888 |
      | System lock                    | 0.000013 | 0.000008 |   0.000005 |                 0 |                   0 |            0 |             0 |     0 | mysql_lock_tables     | lock.cc       |         299 |
      | Waiting for query cache lock   | 0.000035 | 0.000020 |   0.000015 |                 0 |                   0 |            0 |             0 |     0 | try_lock              | sql_cache.cc  |         458 |
      | init                           | 0.000021 | 0.000011 |   0.000009 |                 0 |                   0 |            0 |             0 |     0 | mysql_select          | sql_select.cc |        2594 |
      | optimizing                     | 0.000005 | 0.000003 |   0.000002 |                 0 |                   0 |            0 |             0 |     0 | optimize              | sql_select.cc |         865 |
      | statistics                     | 0.000008 | 0.000005 |   0.000003 |                 0 |                   0 |            0 |             0 |     0 | optimize              | sql_select.cc |        1071 |
      | preparing                      | 0.000008 | 0.000005 |   0.000004 |                 0 |                   0 |            0 |             0 |     0 | optimize              | sql_select.cc |        1093 |
      | executing                      | 0.000003 | 0.000001 |   0.000001 |                 0 |                   0 |            0 |             0 |     0 | exec                  | sql_select.cc |        1851 |
      | Sending data                   | 0.021165 | 0.000235 |   0.000176 |                 2 |                   0 |          520 |             0 |     0 | exec                  | sql_select.cc |        2395 |
      | end                            | 0.000013 | 0.000006 |   0.000005 |                 0 |                   0 |            0 |             0 |     0 | mysql_select          | sql_select.cc |        2630 |
      | query end                      | 0.000005 | 0.000003 |   0.000001 |                 0 |                   0 |            0 |             0 |     0 | mysql_execute_command | sql_parse.cc  |        4465 |
      | closing tables                 | 0.000010 | 0.000005 |   0.000005 |                 0 |                   0 |            0 |             0 |     0 | mysql_execute_command | sql_parse.cc  |        4517 |
      | freeing items                  | 0.000008 | 0.000005 |   0.000003 |                 0 |                   0 |            0 |             0 |     0 | mysql_parse           | sql_parse.cc  |        5793 |
      | Waiting for query cache lock   | 0.000003 | 0.000001 |   0.000001 |                 0 |                   0 |            0 |             0 |     0 | try_lock              | sql_cache.cc  |         458 |
      | freeing items                  | 0.000024 | 0.000014 |   0.000011 |                 0 |                   0 |            0 |             0 |     0 | NULL                  | NULL          |        NULL |
      | Waiting for query cache lock   | 0.000003 | 0.000001 |   0.000000 |                 0 |                   0 |            0 |             0 |     0 | try_lock              | sql_cache.cc  |         458 |
      | freeing items                  | 0.000003 | 0.000002 |   0.000001 |                 0 |                   0 |            0 |             0 |     0 | NULL                  | NULL          |        NULL |
      | storing result in query cache  | 0.000003 | 0.000002 |   0.000002 |                 0 |                   0 |            0 |             0 |     0 | end_of_result         | sql_cache.cc  |        1024 |
      | logging slow query             | 0.000003 | 0.000001 |   0.000001 |                 0 |                   0 |            0 |             0 |     0 | log_slow_statement    | sql_parse.cc  |        1479 |
      | cleaning up                    | 0.000004 | 0.000002 |   0.000002 |                 0 |                   0 |            0 |             0 |     0 | dispatch_command      | sql_parse.cc  |        1435 |
      +--------------------------------|----------|----------|------------|-------------------|---------------------|--------------|---------------|-------|-----------------------|---------------|-------------+

## mysql查询条件查询 ~ [string函数](https://dev.mysql.com/doc/refman/5.7/en/string-functions.html)

- 其中一个 *instr* 可以查询某些字段一些包含有特殊字符串的数据， 比如 

```
select * from demo.stocks where instr(column_name, '*')  limit 1;
```

