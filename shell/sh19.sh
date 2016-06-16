#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

read -p "Please input a number, i will count for 1+2+..+YOUR_INPUT: " nu
s=0
for  (( i=1; i<=$nu; i=i+1 )) 
do
    s=$( ($s+$i) )
done
echo "The result of '1+2+3+...+$nu' is ==> $s"
