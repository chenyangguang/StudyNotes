#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

echo "This program will try to calculate:"
echo "How many days before your demobilization date..."
read -p "Please input your demobilization date (YYYYMMDD ex>20150525): " date2
date_d=$(echo $date2 | grep '[0-9]\{8\}')  #看看是否是八个数字
if [ "$date2" == "" ]; then
    echo "You input the wrong date format...."
    echo 1
fi

#计算日期
declare -i date_dem= `date  --date="$date2" +%s` #退伍日期秒数
declare -i date_now=`date +%s`                   #现在日期秒数
declare -i date_total_s=$( ($date_dem-$date_now) ) #剩余
declare -i date_d=$( ($date_total_s/60/60/24) )
if[ "$date_total_s" -lt "0" ]; then
    echo "You had been demobilization before: " $( (-1*$date_d) ) " ago"
fi
