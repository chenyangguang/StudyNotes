#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export=PATH
echo -e "You should input 2 numbers, i will cross them! \n"
read -p "first number: " firstnu
read -p "second number: " secnu
total=$(($firstnu*$secnu))
echo -e "\nThe result of $firstnu × $secnu is ==> $total"

