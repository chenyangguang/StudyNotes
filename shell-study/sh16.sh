#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

#Use id, finger command to check system account's information.

users=$( cut -d ':' -f1 /etc/passwd )
for  username in $users 
do
    id $username
    finger $username
done
