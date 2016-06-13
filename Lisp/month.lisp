(defun leap-year(year)
  (
   and (zerop (mod year 4))
   (zerop (mod year 400))
   (not (zerop (mod year 100))
		)
   )

  (defun month-length(year mon)
	(case mon
	  ((Jan Mar May July Aug Oct Dec) 31)
	  ((Apr June Sept Nov) 30)
	  ((Feb) (if ( = 1 ( leap-year year) 29 28)
			   (otherwise "Unknown month")
			   )
			 )
	  (format t "there are -a days in 2012 Jan ～%" (month-lenght 2012 `Jan))

