;全局变量使用defvar结构声明
(defvar x 234)
(write x)

(setq x 10)
(setq y 20)
(format t "x = ~2d y = ~2d ~%" x y)
(setq x 100)
(setq y 300)
(format t "x = ~2d y = ~2d" x y)
