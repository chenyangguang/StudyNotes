echo -e "\e[1;31m 考考你 \e[0m"
echo -e "\e[1;35m 考考你 \e[0m"
用颜色输出字体

1. 命令别名和快捷键

2. 历史命令

3. 输出重定向

4. 多命令顺序执行

5. 


标准输入输出


设备      设备文件名            文件描述符        类型


键盘      /dev/stdin             0                标准输入     < 或 <<

显示器    /dev/stdout            1                标准输出      > 或 >>

显示器    /dev/stderr            2                标准错误输出  2>或2>>

>  或 <      覆盖
>> 或 << 追加

datecang 2>>test.log
2>>test.log在之间不要空格


cmd1 && cmd2    若cmd1 执行完毕且正确执行（$?=0）, 则开始执行cmd2
                若cmd1 执行完毕且错误($?!=0) ，    则cmd2不执行

cmd1 || cmd2    若cmd1 执行完毕且正确执行($?=0), 则cmd2不执行
                若cmd1 执行完毕且错误($?!=0),    则开始执行cmd2

ls ./abc && touch ./abc/hehe
mkdir ./abc
ll ./abc && touch ./abc/heh
ll ./abc || mkdir ./abc/hehehe
ll ./abc || mkdir ./abc && touch ./abc/hehhheh -> 总是会创建 hehhheh 文件 

$? 是 linux 命令回传码

