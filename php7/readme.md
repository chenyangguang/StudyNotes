php新特性
(1)变量类型
php版本函数的参数和返回值增加了类型限定。为了php7.1版本的JIT特性做准备，增加类型后的PHP JIT开可以准确判断变量类型，生成最佳的机器指令。
function test (int $a, string $b, array $c) : int{
    //code
    }

(2)php程序出错后过去Zend引擎会发生致命错误并终止程序运行， PHP7可以使用try/catch捕获错误

    try{
        non_exists_func();
        }catch (EngineException $e){
            echo "Exception: {$e->getMessage()}\n";
            }

php7性能优化
(1)zval使用栈内存
    在Zend引擎和扩展中， 经常要创建一个PHP的变量，底层就是一个zval指针。之前的版本都是通过MAKE_STD_ZVAL动态的从堆上分配一个zval内存。而php7可以直接使用栈内存。
    php5 
        zval * val; MAKE_STD_ZVAL(val);
    php7 
        zval val;
(2)zend_string存储hash值， array查询不再需要重复计算hash值
    php7 为字符串单独创建了新类型叫做zend_string，除了char*指针和长度之外，增加了一个hash字段，用于保存字符串的hash值。数组键值查找不再需要反复计算hash值。
    struct _zend_string{
        zend_refcounted gc;
        zend_ulong      h;
        size_t          len;
        char            val[1]
        };
(3)hashtable桶内直接存数据，减少了内存申请次数，提升了Cache命中率和内存访问速度
(4) zend_parse_parameters改为宏实现，性能提升5%
(5) 新增加4种OPCODE, call_user_function, is_int/string/array, strlen,defined四个函数变为PHP OpCode指令， 速度更快
(6) 其他更多性能优化，如基础类型int, float, bool等改为直接进行值拷贝，排序算法改进，PCRE with JIT, execute_data和opine使用u全局寄存器，使用gdb4.8的PGO功能

PHP7.0-final版本不会携带JIT特性
JIT是just in time的缩写，表示运行时将指令转为二进制机器码
对于计算密集型的程序， JIT可以将php的OpCode直接转换为机器码,大幅提升性能。
预计PHP7.1会带有JIT特性


