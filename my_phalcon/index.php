<?php
$loader = new \Phalcon\Loader();
$loader->registerDirs(array(
	'../app/controllers/',
	'../app/models/'
))->register();

Create a DI
	$di = new Phalcon\DI\FactoryDefault();

Setting up the view component
	$di->set('view', function(){
		$view = new \Phalcon\Mvc\View();
		$view->setViewsDir('../app/views/');
		return $view;
	});

Handle the request
	$application = new \Phalcon\Mvc\Application();
$application->setDI($di);
echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
	echo "PhalconException: ", $e->getMessage();
}
?>
