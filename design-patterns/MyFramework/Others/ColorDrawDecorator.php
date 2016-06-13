<?php
namespace Others;

/**
 * 
 **/
class ColorDrawDecorator implements DrawDecorator
{
	
	protected $color;
	function __construct($color='red')
	{
		$this->color = $color;
	}


	public function beforeDraw()
	{
		echo '<div id="name" style="color:{$this->color};">';
	}

	public function afterDraw()
	{
		echo '</div>';
	}
}
?>
