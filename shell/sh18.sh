#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

#查看目录是否存在
read -p "Please input a directory : " dir
if [ "$ir" == "" -o ! -d "$dir" ]; then
    echo "The $dir is NOT exist in your system."
    exit 1
fi

#开始测试文件
filelist=$( ls $dir )
for filename in $filelist
do  
    perm=""
    test -r "$dir/$filename" && perm="$perm readable"
    test -w "$dir/$filename" && perm="$perm writable"
    test -x "$dir/$filename" && perm="$perm executable"
    echo "The file $dir/$finename's permission is $perm"
done
