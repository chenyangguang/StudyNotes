(defmacro item (priority note))
`(block
(print stdout tab "Prority: " ~(head(tail priority)) end1)
(print stdout tab "Note: " ~note end1 end1)))
