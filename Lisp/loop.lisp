;循环loop
(setq a 100)
(loop
(setq a (+ a 1))
(write a)
(terpri)
(when (> a 200) (return a)))

#|(loop for loop-variable in <a list>
	do (action))
(loop for loop-variable from value1 to value2
	do (action))|#

(loop for x in '(tom dick harry)
	do (format t "~s" x)
	(terpri)
 )

(loop for y from 99 to 999
	if(evenp y)
	do (print y)
 )

#|(do (variable1 value1 updated-value1)
	(variable2 value2 updated-value2)
	(variable3 value3 updated-value3)
	...

(test return-value)
(s-expressions))|#


(do ((x 0 (+ 2 x))
	 (y 20 ( - y 2)))
 ((= x y)(- x y))
	 (format t "~% x = ~d  y = ~d" x y))

;dotimes
(dotimes (n 11)
	(print n) (print (* n n )))

;dolist
(dolist (n '(1 2 3 4 5 6 7 8 9))
 (format t "~% Number: ~d Square: ~d" n (* n n)))

;block
#|(block block-name(
...
...
...
...
))|#
(defun demo-function(flag)
	(print 'entering-outer-block)
	(block outer-block
		(print 'entering-inner-blcok)
		(print (block innner-block
					  (if flag
					   (return-from outer-block 3)
					   (return-from innner-block 5))
					  (print 'This-will-not-be-printed)))
		(print 'left-inner-block)
		(print 'leaving-outer-block)
		t))
(demo-function t)
(terpri)
(demo-function nil)
