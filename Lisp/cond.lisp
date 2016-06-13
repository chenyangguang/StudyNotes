;cond 条件判断
(setq a 10)
(cond ((> a 20)
	   (format t "~% a is less than 20"))
 (t (format t "~% value of a is ~d" a)))

(terpri)
;if 
(setq b 10)
(if (> b 10)
	(format t "~% b is less than 20"))
(format t "~% value of b is ~d" b)

(terpri)
;if ... then ...
(setq c 10)
(if (> c 20)
	(format t "~% c is greater than 20")
	(format t "~% c is less than 20"))
(format t "~% value of c is ~d" c)

(terpri)
(setq d 10)
	(if (> d 20)
	 then (format t "~% d is less than 20"))
(format t "~% value of d is ~d" d)

(terpri)
;case 循环
(setq day 7)
(case day
	(1 (format t "~% Monday"))
	(2 (format t "~% TuesDay"))
	(3 (format t "~% Wednesday"))
	(4 (format t "~% Thursday"))
	(5 (format t "~% Friday"))
	(6 (format t "~% Saturday"))
	(7 (format t "~% Sunday")))

