<?php
    $data = 'theCityName=深圳';
    $curl_obj = curl_init(); // 初始化
    $url = 'http://www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName';
    curl_setopt($curl_obj, CURLOPT_URL, $url); // 设置访问URL
    curl_setopt ( $curl_obj, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl_obj, CURLOPT_HEADER, 0); // 启用时会将头文件的信息作为数据流输出
    curl_setopt($curl_obj, CURLOPT_RETURNTRANSFER, 1); // 执行之后不直接打印出来
    // curl_setopt($curl_obj, CURLOPT_POST,count($data));
    curl_setopt($curl_obj, CURLOPT_POST, 1); // 启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。
    curl_setopt($curl_obj, CURLOPT_POSTFIELDS, $data); // 全部数据使用HTTP协议中的"POST"操作来发送。要发送文件，在文件名前面加上@前缀并使用完整路径。这个参数可以通过urlencoded后的字符串类似'para1=val1&para2=val2&...'或使用一个以字段名为键值，字段数据为值的数组。如果value是一个数组，Content-Type头将会被设置成multipart/form-data。
    curl_setopt($curl_obj, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded;',
            'Content-length:'.strlen($data)
            ));
    $rtn = curl_exec($curl_obj); // 执行
    if (!curl_errno($curl_obj)) {
        echo $rtn;
    } else {
        echo 'Curl error: ' . curl_errno($curl_obj);
    }
    curl_close($curl_obj); // 关闭资源
?>
