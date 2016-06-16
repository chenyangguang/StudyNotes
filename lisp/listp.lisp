(if (listp '(a b c))
    (format t "~A plus ~A equals ~A. ~%" 2 3 (+ 2 3))
    (format t "~A plus ~A equals ~A. ~%" 5 6 (+ 5 6)))
(if (listp 17)
    (format t "~A plus ~A equals ~A. ~%" 2 3 (+ 2 3))
    (format t "~A plus ~A equals ~A. ~%" 5 6 (+ 5 6)))
(and t (+ 1 2))
    (format t "~A plus ~A equals ~A. ~%" 1 2 (+ 1 2))
    ;~A 表示占位, ~%表示换行
    ;标准的输入函数是read
(defun askem (string)
    (format t "~A" string)
    (read))
(askem "How old are you?")

(let ((x 1)(y 23))
 (+ x y))

    ;這個函數創建了變數 val 來儲存 read 所返回的物件。因爲它知道該如何處理這個物件，函數可以先觀察你的輸入，再決定是否返回它。你可能猜到了， numberp 是一個謂詞，測試它的實參是否爲數字
(defun ask-number ()
    (format t "please enter a number. ")
    (let ((val (read)))
     (if (numberp val)
      val
      (ask-number))))
(ask-number)
