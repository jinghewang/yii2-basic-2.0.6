<?php
/**
 * Created by PhpStorm.
 * User: robin
 * Date: 2015/12/31
 * Time: 15:52
 */

namespace app\hlt;


use app\hlt\helpers\BDataHelper;

class Sms
{

    public static $ResultCode = [
        ' 0' => '提交成功',
        '-1' => '账号未注册',
        '-2' => '其他错误',
        '-3' => '帐号或密码错误',
        '-5' => '余额不足，请充值',
        '-7' => '提交信息末尾未加签名，请添加中文的企业签名【 】',
        '-6' => '定时发送时间不是有效的时间格式',
        '-8' => '发送内容需在1到300字之间',
        '-9' => '发送号码为空',
        '-10' => '定时时间不能小于系统当前时间',
        '-101' => '调用接口速度太快',
    ];

    public function getInitParams(){
        return ['CorpID' => BDataHelper::getSmsConfig('username'), 'Pwd' => BDataHelper::getSmsConfig('password')];
    }

    private $arr = [0 => '00', '1' => '11', '3' => '33'];
    private $arr2 = [0 => '00', 1 => '11', 3 => 33];
    public function test(){
        print_r($this->arr);
        print_r($this->arr2);
    }

    public function hello()
    {
        $client = $this->getSoapClient();
        $param = array();
        $res = $client->__Call('HelloWorld', array('paramters' => $param));
        //$usr=json_decode($result); //$usr->token;
        return $res;
    }

    public function BatchSend($mobiel,$content)
    {
        $client = $this->getSoapClient();
        $param = ['Mobile' => $mobiel, 'Content' => $content, 'Cell' => '', 'SendTime' => ''];
        $param = array_merge($this->getInitParams(), $param);
        $result = $client->__Call('BatchSend', array('paramters' => $param));
        if (is_soap_fault($result))
            trigger_error("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})", E_USER_ERROR);

        return $result;
    }

    /**
     * getSoapClient
     * @return SoapClient
     */
    function getSoapClient(){
        //$client = new SoapClient($this->api_url, array('proxy_host' => "127.0.0.1",'proxy_port' => '8888','encoding'=>'utf8'));
        $client = new \SoapClient(BDataHelper::getSmsConfig('api'), array('encoding' => BDataHelper::getSmsConfig('charset')));
        return $client;
    }

}