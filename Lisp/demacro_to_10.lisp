;宏的定义包含宏的名称，参数列表，　可选的文档字符串，和Lisp表达式的字体，它定义由宏执行的任务。　
(defmacro setTo10(num)
(setq num 10)(print num))
(setq x 25)
(print x)
(setTo10 x)
