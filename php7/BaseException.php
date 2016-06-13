<?php
try{
	call_method(null); // oops!
}catch(EngineException $e){
	echo "Exception: {$e->getMessage()}\n";
}
?>
