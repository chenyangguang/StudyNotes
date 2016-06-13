<?php
$dom = new DOMDocument('1.0', 'utf-8');
$element = $dom->createElement("test", 'This is chenyangguang test php create xml document' );
$dom->appendChild($element);
echo $dom->saveXML();
?>
