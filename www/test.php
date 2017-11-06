<?php
class test
{
	public  function httpsCurl($url,$data=null)
    	{
        $curl = curl_init(); //初始化cURL会话
        curl_setopt($curl, CURLOPT_URL, $url);  //需要获取的URL地址，也可以在curl_init()函数中设置。
        curl_setopt($curl, CURLOPT_TIMEOUT,15);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出
        if(!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。不验证ssi的证书检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);//这个是重点。不验证ssi的证书检查
        $data = curl_exec($curl);  //执行curl会话
	
        curl_close($curl);
        return $data;
    	}
}
$ob = new test();
$rs = $ob->httpsCurl('https://www.baidu.com/');
var_dump($rs);
