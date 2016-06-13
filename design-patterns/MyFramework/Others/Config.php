<?php
namespace Others;

/**
 * 
 **/
class Config implements \ArrayAccess // php标准接口，将一个对象转化成可访问的数组方式
{
	
	protected $path;
	protected $configs = [];

	function __construct($path)
	{
		$this->path = $path;
	}

	function offsetGet($key)
	{
		if (empty($this->configs[$key])) {
			$file_path = $this->path.'/'.$key.'.php';
			$config = require $file_path;

			$this->configs[$key] = $config;
		}

		return $this->configs[$key];
	}

	function offsetSet($key, $value)
	{
		throw new \Exception("Cannot write config file!");
	}

	function offsetExists($key)
	{
		return isset($this->configs[$key]);
	}

	function offsetUnset($key)
	{
		// code...
	}
}
?>
