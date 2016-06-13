<?php
namespace Others;
class Object 
{

	protected $array = array();
		public static function test()
		{
			echo "aaa";
		}

		public function __set($key, $value)
		{
			$this->array[$key] = $value;
		}

		public function __get($key)
		{
			//var_dump(__METHOD__);
			return $this->array[$key];
		}

		public function __call($func, $params)
		{
			return "magic function";
		}

		public function __toString()
		{
			return __CLASS__;
		}

		public function __invoke($param)
		{
			var_dump($param);
			return "invoke";
		}
}
