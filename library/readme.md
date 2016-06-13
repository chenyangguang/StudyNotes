1、 需求原由:
    (1) 提高图书管理的借阅便利。解放生产力。
    (2) 好吧， 其实我是使用laravel框架来练练手的。顺便提高下别人叼我代码的节奏。

2、 功能：
    (1) oa管理图书的增、删、改、查， 借
    (2) 前端展示、查、预借图书

3、 微型图书馆系统数据结构设计
    (1) 新建一个图书库 library

    (2) 图书基本信息表 (book_id， 图书编号， 书名， 借阅状态[ 0:不可借，1可借 ])
    (3) 借阅人信息表(工号, 姓名， 性别, 组别, 电话, 邮箱)
    (4) 图书详情表(id, book_id， 图书类别id, 图片介绍, 内容简要)
    (5) 借阅记录表(借阅id, 借阅人， 借阅时间， 归还时间, 允许借阅天数, 续借否, 备注)
    (6) 分类表(type_id, 类别名)
    (7) 图书规则表(rule_id, 标题，内容)

4、实现方式
    jquery
    laravel
    boostrap

CREATE DATABASE library;
USE library;

create table book_primary(
        book_id INT NOT NULL AUTO_INCREMENT, 
        book_code VARCHAR(50) NOT NULL comment '图书编号', 
        status TINYINT(4) NOT NULL DEFAULT 0 comment '借阅状态, 0:不可借，1:可借',
        PRIMARY KEY ('book_id'),
        )ENGINE=InnoDB DEFAULT CHARSET=utf8 comment='图书主表';

create table borrow_people(
        person_id INT NOT NULL AUTO_INCREMENT comment '工号', 
        name VARCHAR(30) NOT NULL DEFAULT '' comment '借阅人姓名', 
        phone VARCHAR(20) NOT NULL DEFAULT '' comment '借阅者电话',
        email VARCHAR(50) NOT NULL DEFAULT '' comment '借阅者邮箱',
        sex TINYINT(2) NOT NULL DEFAULT 0 comment '性别',
        group VARCHAR(30) NOT NULL DEFAULT '所在组别名称',
        PRIMARY KEY ('person_id'),
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table book_detail(
        detail_id INT NOT NULL AUTO_INCREMENT, 
        book_id INT not NULL DEFAULT 0, 
        type_id INT NOT NULL DEFAULT 0 comment '所属分类id', 
        book_name VARCHAR(50) NOT NULL DEFAULT '' comment '书名', 
        brief VARCHAR(255) NOT NULL DEFAULT '' comment '书籍简要',
        PRIMARY KEY ('detail_id'),
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table borrow_record(
        record_id int not null AUTO_INCREMENT,
        person_id int not null DEFAULT 0, 
        create_time int(11) not null DEFAULT 0 comment '借阅时间', 
        update_time int(11) not null DEFAULT 0 comment '更新时间', 
        long_day smallint not null DEFAULT 30 comment '可借天数', 
        remarks text not null DEFAULT '' comment '备注',
        PRIMARY KEY ('record_id'),
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table book_category(
        category_id int not null AUTO_INCREMENT, 
        category_name VARCHAR(50) NOT NULL DEFAULT '' comment '分类名称',
        PRIMARY KEY ('category_id'),
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table book_rule(
        rule_id int not null  AUTO_INCREMENT,
        rule_title VARCHAR(50) not null DEFAULT '' comment '规则标题',
        rule_content text not null DEFAULT '' comment '借阅规则内容',
        PRIMARY KEY ('rule_id'),
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;
