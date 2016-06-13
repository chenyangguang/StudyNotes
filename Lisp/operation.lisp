;运算符
;incf 递增，　decf递减
(setq a 10)
(setq b 30)
	(format t "~% A + B = ~d" (+ a b))
	(format t "~% A - B = ~d" (- a b))
	(format t "~% A * B = ~d" (* a b))
	(format t "~% A / B = ~d" (/ a b))
	(format t "~% Increment A by 3 = ~d" (incf a 3))
	(format t "~% Decrement A by 4 = ~d" (decf b 10))

;比较运算
(setq c 30)
(setq d 60)
(format t "~% A = B is ~a" (= a b))
(format t "~% A /= B is ~a" (/= a b))
(format t "~% A >= B is ~a" (> a b))
(format t "~% A < B is ~a" (< a b))
(format t "~% A >= B is ~a" (>= a b))
(format t "~% A <= B is ~a" (<= a b))
(format t "~% Max of A and B is ~d" (max a b))
(format t "~% Min of A and B is ~d" (min a b))

; 布尔计算
(setq e 10)
(setq f 30)
(format t "~% A and B is ~a" (and a b))
(format t "~% A or B is ~a" (or a b))
(format t "~% not A is ~a" (not a))

(terpri) ;空行

(setq a nil)
(setq b 5)
(format t "~% A and B is ~a" (and a b))
(format t "~% A or B is ~a" (or a b))
(format t "~% not A is ~a" (not a))

(terpri)
	(setq a  nil)
	(setq b 0)
	(format t "~% A and B is ~a" (and a b))
	(format t "~% A or B is ~a" (or a b))
	(format t "~% not A is ~a" (not a))
(terpri)
	(setq a 10)
	(setq b 30)
	(setq c 0)
	(setq d 40)
	(format t "~% Result of and operation on 10, 30, 0, 40 is ~a" (and a b c d))
	(format t "~% Result of or operation on 10, 30, 0, 40 is ~a" (or a b c d))

