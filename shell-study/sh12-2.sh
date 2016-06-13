#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

function printit() {
    echo -n "Your choice is " #加上 -n 可以不断继续在同一行显示
}

echo "This program will print your selecttions"
case $1 in 
    "one")
        printit; echo $1 | tr 'a-z' 'A-Z' #大小写转换
        ;;
    "two")
        printit; echo $1 | tr 'a-z' 'A-Z'
        ;;
    "three")
        printit; echo $1 | tr 'a-z' 'A-Z'
        ;;
    *)
        echo "Usage $0 {one | two | three}"
        ;;
esac
