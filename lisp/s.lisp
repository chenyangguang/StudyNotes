; case-sensitive comparison
(write (char= #a ))
	(terpri)
	(write (char= #a #a))
	(terpri)
	(write (char= #a #A))
	(terpri)
	;case-insensitive comparision
	(write (char-equal #a #A))
	(terpri)
	(write (char-equal #a ))
	(terpri)
	(write (char-lessp #a  #c))
	(terpri)
	(write (char-greaterp #a  #c))

