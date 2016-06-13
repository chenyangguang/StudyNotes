;宏是扩展标准LISP的语法
;宏是一个函数，　它接受一个s-expression作为参数，并返回一个lisp的形式，　然后进行评估计算
;定义一个宏的语法
(defmacro macro-name (paramater-list)
 "Optional documentation string."
 body-form)
