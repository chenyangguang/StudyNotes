#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

#Using for ... loop to print 3 animals
for animal in dog cat elephant
do 
    echo "There are ${animal}s"
done

