<?php
/**
 * @Test Controllers
 * @控制器的作用是调用模型，并调用视图，将模型产生的数据传递给视图，并让相关的试图去显示
 **/
class TestController
{
    function show()
    {
        //$TestModel = new TestModel();
        $TestModel = M('Test');
        $data = $TestModel->get();
        //$TestView = new TestView();
        $TestView = V('Test');
        $TestView->display($data);
    }

}
?>
