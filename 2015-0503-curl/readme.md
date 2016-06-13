(1)cURL定义: 
    curl is a command line tool for transferring data with URL syntax, 即使用URL语法传输数据的命令行工具-> 
                                客户端想服务器请求资源的工具

(2)cURL的使用场景
a.网页资源 
    -> 编写网页爬虫
b.WebService数据接口资源 
    ->动态获取接口数据，比如天气，号码归属地的等
c. FTP服务器里面的文件
    ->下载FTP服务器里面的文件
d. 其他资源
    ->所有网络上的资源都可以用cURL访问和下载到

(3)php -i | grep curl 查看是否支持curl

(4)在PHP中使用cURL
    初始化cURL(curl_init()) 

    ->向服务器发送请求(curl_exec()) 

    -> 接受服务器数据 

    -> 关闭cURL(curl_close())

(5)制作一个网页爬虫
(6)替换下载的内容并输出
(7)用cURL调用WebServer获取天气信息
(8)登录慕课网个人中心，并下载
(9)ftp下载
(10)ftp 上传
