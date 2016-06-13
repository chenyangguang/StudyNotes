<?php
namespace Others;
/**
 * 
 **/
class SizeDrawDecorator implements DrawDecorator
{
	
	protected $size;
	function __construct($size)
	{
		$this->size=$size;
	}

	public function beforeDraw()
	{
		echo "<div id='name' style='font-size: {$this->size}'> ";
	}

	public function afterDraw()
	{
		echo "</div>";
	}
}

