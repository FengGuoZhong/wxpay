<?php
namespace yii\WxPay\Data;
use yii\WxPay\WxPayException;
use yii\WxPay\Data\WxPayDataBase;

/**
 * 
 * 接口调用结果类
 * @author widyhu
 *
 */
class WxPayResults extends WxPayDataBase
{
	/**
	 * 
	 * 检测签名
	 */
	public function CheckSign()
	{
		//fix异常
		if(!$this->IsSignSet()){
			throw new WxPayException("签名错误！");
		}
		
		$sign = $this->MakeSign();
		if($this->GetSign() == $sign){
			return true;
		}
		throw new WxPayException("签名错误！");
	}
	
	/**
	 * 
	 * 使用数组初始化
	 * @param array $array
	 */
	public function FromArray($array)
	{
		$this->values = $array;
	}
	
	/**
	 * 
	 * 使用数组初始化对象
	 * @param array $array
	 * @param 是否检测签名 $noCheckSign
	 */
	public static function InitFromArray($array, $noCheckSign = false)
	{
		$obj = new self();
		$obj->FromArray($array);
		if($noCheckSign == false){
			$obj->CheckSign();
		}
        return $obj;
	}
	
	/**
	 * 
	 * 设置参数
	 * @param string $key
	 * @param string $value
	 */
	public function SetData($key, $value)
	{
		$this->values[$key] = $value;
	}
	
    /**
     * 将xml转为array
     * @param unknown $xml
     * @param string $isChekSign 是否验签
     */
	public static function Init($xml,$isChekSign = true)
	{	
		$obj = new self();
		$obj->FromXml($xml);
		//fix bug 2015-06-29
		if ($obj->values['return_code'] != 'SUCCESS'){
			 return $obj->GetValues();
		}
		
		if ($isChekSign){
			$obj->CheckSign();
		}
		
        return $obj->GetValues();
	}
}


