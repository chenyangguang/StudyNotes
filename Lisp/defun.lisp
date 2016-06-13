#|函数组成分为
	函数名称
	函数参数
	函数的体|#
	
;求平均数
(defun averagenum(n1 n2 n3 n4 n5)
	(/ (+ n1 n2 n3 n4 n5) 5))
(write(averagenum 10 20 30 40 50))

;求圆面积
(defun area-of-circle(rad)
	"计算给定半径圆的面积(Calculates area of a circle with given radius)"
	(terpri)
	(format t "Radius: ~5f" rad)
	(format t "~%Area: ~10f" (* 3.141592 rad rad)))
	(area-of-circle 12)
;可变数目的参数
(defun show-nums (a b &rest values)(write (list a b values)))
	(show-nums 1 2 3)
	(terpri)
	(show-nums 'a 'b 'c 'd)
	(terpri)
	(show-nums 'a 'b)
	(terpri)
	(show-nums 1 2 3 4)
	(terpri)
	(show-nums 1 2 3 4 5 6 7 8 9 10)

(terpri)
;关键字参数, &key符号表示, 
(defun show-amain (&key a b c d) (write (list a b c d)))
	(show-amain :a 1 :c 2 :d 3)
	(terpri)
	(show-amain :a 'x :b 'y :c 'z :d 'w)
	(terpri)
	(show-amain :a 'k :d 'l)
	(terpri)
	(show-amain :a 1 :b 2)

(terpri)
;从函数返回的值, 默认在lisp函数返回最后一个表达式作为返回的值
(defun add-all(a b c d)
	(+ a b c d ))
(setq sum (add-all 10 21 23 34))
(write sum)

(terpri)
(write (add-all 33.9 43.2 43.5 5.0))

(terpri)
(defun myfun (num)
	(return-from myfun 10)
	num)
(write (myfun 20))

(terpri)
(defun myfun-2 (num)
	(return-from myfun-2 10)
	write num)
(write (myfun-2 20))

(terpri)
;lambda函数，匿名函数
;(lanbda (parameters) body)
(write ((lambda (a b c x)
		(+ (* a (* x x)) (* b x) c))
		 4 2 9 3))

;************************************
(terpri)
(write (mapcar '1+ '(23 34 45 67 78 89)))

(terpri)
;计算立方
(defun cubeMylist(lst)
 (mapcar #'(lambda(x) (* x x x)) lst))
	(write (cubeMylist '(2 3 4 6 8 9 10)))

(terpri)
	(write (mapcar '+ '(1 3 5 7 9 11 13) '(2 4 6 8)))

