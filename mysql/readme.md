grant select,insert,update,delete on library.* to library@localhost Identified by "library";
grant select,insert,update,delete on gitvim.* to gitvim@localhost Identified by "gitvim";


sum 使用的时候注意先将需要必要的字段分组, 否则将sum(money)计算表内这个字段的总数
select sum(money) from in_come group by member_id;
