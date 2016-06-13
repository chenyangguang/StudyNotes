<?php
namespace Others;
/**
 * 
 **/
class Register
{
	
	protected static $objects;
	static function set($alias, $object)
	{
		self::$objects[ $alias ] = $object;
	}

	static function get($name)
	{
		return self::$objects[ $alias ];
	}

	function _unset($alias)
	{
		unset(self::$objects[ $alias ]);
	}
}
?>
