<?php
/*
 *  按json方式输出通信数据
 *  @param integer $code状态码
 *  @param string $message提示信息
 *  @param array $data数据
 *  @param string $type数据格式
 *  return string
 * 
 */
class Response{
    const JSON='json';
    public static function show($code, $message= '', $data=array(), $type=self::JSON)
    {
        if (!is_numeric($code)) {
            return '';
        }

        $type = isset($_GET['format']) ? $_GET['format'] : self::JSON;

        $result = array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );
        if ($type == 'json') {
            self::json($code, $message, $data);
            exit();
        }elseif($type=='array'){
            var_dump($result); //调试

        }elseif($type=='xml'){
            self::xmlEncode($code, $message, $data);
            exit();
        }else {
            // code...
        }
    }

    public static function json($code, $message='', $data=array())
    {
        if (!is_numeric($code)) 
        {
            return '';
        }

        $result = array(
            'code'=>$code,
            'message'=> $message,
            'data'=>$data
        );
        echo json_encode($result);
        exit();
    }

    public static function xml()
    {
        //header("Content-Type:text/xml");
        $xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml .= "<root>\n";
        $xml .= "<code>200</code>\n";
        $xml .= "<message>数据</message>\n";
        $xml .= "<data>\n";
        $xml .= "<id>1</id>\n";
        $xml .= "<name>chenyangguang</name>\n";
        $xml .= "</data>\n";
        $xml .= "</root>\n";
        echo $xml;
    }
    //Response::xml();
    /*
     *  按xml方式输出通信数据
     *  @param integer $code状态码
     *  @param string $message提示信息
     *  @param array $data数据
     *  return string
     * 
     */
    public static function xmlEncode($code, $message='', $data=array()){
        if (!is_numeric($code)) {
            return '';
        }

        $result = array(
            'code'=> $code,
            'message'=> $message,
            'data'=>$data
        );

        header("Content-Type: text/xml");
        $xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml .= "<root>\n";
        $xml .= self::xmlToEncode($result);
        $xml .= "</root>";
        echo $xml;
    }
    public static function xmlToEncode($data){
        $xml  = $attr = "";
        foreach ($data as $key=>$value) {
            if (is_numeric($key)) {
                $attr = "id='{$key}'";
                $key  = "item";
            }
            $xml .= "<{$key} $attr>";
            $xml .= is_array($value) ? self::xmlToEncode($value) : $value;
            $xml .= "</{$key}>";
        }
        return $xml;
    }
}

$data = array(
    'id'=>"1",
    'name'=>'chenayngg',
    'type'=>array(4,6, 7),
    'test'=>array(1,45, 67=>array(123, 'tsyta')),
);
//Response::xmlEncode(200, 'success', $data);
?>
