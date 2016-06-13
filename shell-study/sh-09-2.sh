#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

case $1 in 
    "HELLO")
        echo "Hello, how are you?"
        ;;
    "")
        echo "You MUST input parameters, ex> {$0 someword}"
        ;;
    *)
        echo "Usage $0 {hello}"
        ;;
esac
