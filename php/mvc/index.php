<?php
/**
 * @url 形式 index.php?controller=控制器&method=方法名
 **/
    require_once('./function.php');

    //允许访问的控制器和方法名
    $controllerAllow = array('Test', 'index');
    $methodAllow = array('test', 'index');

    $controller = in_array($_GET['controller'], $controllerAllow) ? daddslashes($_GET['controller']) : 'index';
    $method = in_array($_GET['method'], $methodAllow) ? daddslashes($_GET['method']) : 'index';
    C($controller, $method);
