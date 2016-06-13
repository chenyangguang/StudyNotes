<?php
namespace Others;
class Loader
{
		public static function autoload($class)
		{
				require (BASEDIR.'/'.str_replace('\\', '/', $class).".php");
				//var_dump($file);
		}
}
