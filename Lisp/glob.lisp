(defparameter *glob* 99)
(defparameter limit (+ *glob* 1))
    ;检查一个变量是否为全局变量或者常数用boundp
(boundp '*glob*)
