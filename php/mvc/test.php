<?php
/**
        第一： 浏览者 -> 调用控制器，发出指令

        第二： 控制器 -> 按指令选取一个合适的模型
        
        第三： 模型   -> 按控制器指令取相应数据

        第四： 控制器 -> 按指令选取相应视图

        第五： 视图   -> 把第三步取到的数据按用户想要的样子显示出来
 **/
    require_once('TestController.class.php');
    require_once('TestModel.class.php');
    require_once('TestView.class.php');

    $TestController = new TestController();
    $TestController->show();
    $TestModel = new TestModel();
    $TestView = new TestView();
?>
