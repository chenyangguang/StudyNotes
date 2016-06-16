#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

#Use loop to calculate "1+2+3+...+100" result

s=1 # 这是累加的数值变量
i=1 # 这是累计的数值， 1, 2, 3 
while [ "$i" != "100" ]; do
    i = $( ($i + 1) )
    s = $( ($s + $i) )
done


echo "The result of '1+2+3+...+100' is ==> $s"
