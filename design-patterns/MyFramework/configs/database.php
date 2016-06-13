<?php
// 主从分离
$config = [
	'master' => [
		'type' => 'MySQL',
		'host' => '127.0.0.1',
		'user' => 'root',
		'password' => 'root',
		'dbname' => 'test',
	],
	'slave' => [
		'slave1' => [
			'type' => 'MySQL',
			'host' => '127.0.0.01',
			'user' => 'root',
			'password' => 'root',
			'dbname' => 'test',
		],
		'slave2' => [
			'type' => 'MySQL',
			'host' => '127.0.0.01',
			'user' => 'root',
			'password' => 'root',
			'dbname' => 'test',
		],
	],
];

return $config;
?>
