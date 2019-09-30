# 绣春刀之 sed 
需求： 将一个两级目录下的文件夹去掉文件后缀，然后单纯的文件名作为一个sql字段拼接，导入数据库

find . -name '*.zip' | awk -F/ '{print $4}' | awk -F. '{print $1}' > ~/tmp.sql

sed 's/^\(.*\)$/INSERT\ INTO\ tmp_tb\ \(code\)\ VALUES\ \("\1"\)\;/g' tmp.sql   >> sed_tmp.sql
source sed_tmp.sql
