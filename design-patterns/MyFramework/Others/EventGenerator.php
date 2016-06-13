<?php
namespace Others;

abstract class EventGenerator
{
	private  $observers = array();
	function addObserver(Observer $Observer){
		$this->observers[] = $observer;
	}

	function notify(){
		foreach ($$this->observers  as $observer) {
			$observer->update();
		}
	}
}

?>
