;(setf my-array (make-array '(10)))
;(aref my-array 9) 访问第十单元格的内容

(write (setf my-array (make-array '(13))))
(terpri)
	(setf (aref my-array 0) 25)
	(setf (aref my-array 1) 37)
	(setf (aref my-array 2) 100)
	(setf (aref my-array 3) 25)
	(setf (aref my-array 4) 32234)
	(setf (aref my-array 5) 4342)
	(setf (aref my-array 6) -1)
	(setf (aref my-array 7) 11)
	(setf (aref my-array 9) 99)
	(setf (aref my-array 10) 43)
	(setf (aref my-array 11) 37)
	(setf (aref my-array 12) 36)
(write my-array)

(terpri)
(terpri)
(terpri)
(terpri)
(terpri)
;3*3数组
(setf x (make-array '(3 3)
		 :initial-contents '((0 1 2)(3 4 5)(6 7 8))))
(write x)

(setq a (make-array '(4 3)))
(dotimes (i 4)
	(dotimes (j 3)
	 (setf (aref a i j) (list i 'x j '= (* i j)))))
(dotimes (i )
	(dotimes (j 3)
	 (print (aref a i j))))

;make-array 完整语法 make-array dimensions :element-type  :initial-element :initial-contents :adjustable :fily-yiibaier :displaced-to :displaced-index-offset
#|(setq test (make-array '(3 2 3)
			:initial-contents
			'(((a b c) (1 2 3))
			  ((d e f) (4 6 5))
			  ((h i j) (9 3 7))
			)))
(setq array_2 (make-array 4 :displaced-to test
			   :displaced-index-offset 2))
(write test)
(terpri)
(write array_2)|#
