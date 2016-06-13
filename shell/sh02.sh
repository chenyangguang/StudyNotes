#!/bin/bash
#Program
# User inputs his/her first name and last name. Program shows his/her  full name
#History
#2015-05-21 chenyangguang First realease
PATH=/bin:/sbin/:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

read -p "Please input your first name: " firstname #输入用户名
read -p "Please input your last name: " lastname
echo -e "\nYour full name is : $firstname $lastname"

