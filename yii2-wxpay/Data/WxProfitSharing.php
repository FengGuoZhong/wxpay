<?php
namespace yii\WxPay\Data;
use yii\WxPay\Data\WxPayDataBase;


/**
 * 
 * 提交分账输入对象
 * @author widyhu
 *
 */
class WxProfitSharing extends WxPayDataBase
{
	
	/**
	 * 设置微信支付分配的商户号
	 * @param string $value
	 **/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	 * 获取微信支付分配的商户号的值
	 * @return 值
	 **/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	 * 判断微信支付分配的商户号是否存在
	 * @return true 或 false
	 **/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}
	
	/**
	* 设置微信分配的公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* 获取微信分配的公众账号ID的值
	* @return 值
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配的公众账号ID是否存在
	* @return true 或 false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	 * 设置随机字符串，不长于32位。推荐随机数生成算法
	 * @param string $value
	 **/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	 * 获取随机字符串，不长于32位。推荐随机数生成算法的值
	 * @return 值
	 **/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	 * 判断随机字符串，不长于32位。推荐随机数生成算法是否存在
	 * @return true 或 false
	 **/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}
	
	/**
	 * 设置分账接收方(单个)(JSON对象)
	 * @param string $value
	 **/
	public function SetReceiver($value)
	{
		$this->values['receiver'] = $value;
	}
	/**
	 * 获取分账接收方(JSON对象)
	 * @return 值
	 **/
	public function GetReceiver()
	{
		return $this->values['receiver'];
	}
	/**
	 * 判断分账接收方(JSON对象)
	 * @return true 或 false
	 **/
	public function IsReceiverSet()
	{
		return array_key_exists('receiver', $this->values);
	}
	


	/**
	* 设置分账接收方类型
	* @param string $value 
	**/
	public function SetType($value)
	{
		$this->values['type'] = $value;
	}
	/**
	* 获取分账接收方类型
	* @return 值
	**/
	public function GetType()
	{
		return $this->values['type'];
	}
	/**
	* 判断微信分账接收方类型
	* @return true 或 false
	**/
	public function IsTypeSet()
	{
		return array_key_exists('type', $this->values);
	}
	
	
	/**
	 * 设置微信订单号
	 * @param string $value
	 **/
	public function SetTransaction_id($value)
	{
		$this->values['transaction_id'] = $value;
	}
	/**
	 * 获取微信订单号
	 * @return 值
	 **/
	public function GetTransaction_id()
	{
		return $this->values['transaction_id'];
	}
	/**
	 * 判断微信订单号
	 * @return true 或 false
	 **/
	public function IsTransaction_idSet()
	{
		return array_key_exists('transaction_id', $this->values);
	}
	
	/**
	 * 设置商户分账单号
	 * @param string $value
	 **/
	public function SetOut_order_no($value)
	{
		$this->values['out_order_no'] = $value;
	}
	/**
	 * 获取商户分账单号
	 * @return 值
	 **/
	public function GetOut_order_no()
	{
		return $this->values['out_order_no'];
	}
	/**
	 * 判断商户分账单号
	 * @return true 或 false
	 **/
	public function IsOut_order_noSet()
	{
		return array_key_exists('out_order_no', $this->values);
	}
	
	/**
	 * 设置分账接收方(多个)(JSON对象)
	 * @param string $value
	 **/
	public function SetReceivers($value)
	{
		$this->values['receivers'] = $value;
	}
	/**
	 * 获取分账接收方(JSON对象)
	 * @return 值
	 **/
	public function GetReceivers()
	{
		return $this->values['receivers'];
	}
	/**
	 * 判断分账接收方(JSON对象)
	 * @return true 或 false
	 **/
	public function IsReceiversSet()
	{
		return array_key_exists('receivers', $this->values);
	}
	
	
	/**
	 * 设置分账完结描述
	 * @param string $value
	 **/
	public function SetDescription($value)
	{
		$this->values['description'] = $value;
	}
	/**
	 * 获取分账完结描述
	 * @return 值
	 **/
	public function GetDescription()
	{
		return $this->values['description'];
	}
	/**
	 * 判断分账完结描述
	 * @return true 或 false
	 **/
	public function IsDescriptionSet()
	{
		return array_key_exists('description', $this->values);
	}

// 	/**
// 	* 设置分账接收方帐号
// 	* @param string $value 
// 	**/
// 	public function SetAccount($value)
// 	{
// 		$this->values['account'] = $value;
// 	}
// 	/**
// 	* 获取分账接收方帐号
// 	* @return 值
// 	**/
// 	public function GetAccount()
// 	{
// 		return $this->values['account'];
// 	}
// 	/**
// 	* 判断分账接收方帐号
// 	* @return true 或 false
// 	**/
// 	public function IsAccountSet()
// 	{
// 		return array_key_exists('account', $this->values);
// 	}


// 	/**
// 	* 设置分账接收方全称
// 	* @param string $value 
// 	**/
// 	public function SetName($value)
// 	{
// 		$this->values['name'] = $value;
// 	}
// 	/**
// 	* 获取分账接收方全称
// 	* @return 值
// 	**/
// 	public function GetName()
// 	{
// 		return $this->values['name'];
// 	}
// 	/**
// 	* 判断分账接收方全称
// 	* @return true 或 false
// 	**/
// 	public function IsNameSet()
// 	{
// 		return array_key_exists('name', $this->values);
// 	}


// 	/**
// 	* 设置与分账方的关系类型
// 	* @param string $value 
// 	**/
// 	public function SetRelation_type($value)
// 	{
// 		$this->values['relation_type'] = $value;
// 	}
// 	/**
// 	* 获取与分账方的关系类型
// 	* @return 值
// 	**/
// 	public function GetRelation_type()
// 	{
// 		return $this->values['relation_type'];
// 	}
// 	/**
// 	* 判断与分账方的关系类型
// 	* @return true 或 false
// 	**/
// 	public function IsRelation_typeSet()
// 	{
// 		return array_key_exists('relation_type', $this->values);
// 	}


// 	/**
// 	* 设置自定义的分账关系
// 	* @param string $value 
// 	**/
// 	public function SetCustom_relation($value)
// 	{
// 		$this->values['custom_relation'] = $value;
// 	}
// 	/**
// 	* 获取自定义的分账关系
// 	* @return 值
// 	**/
// 	public function GetCustom_relation()
// 	{
// 		return $this->values['custom_relation'];
// 	}
// 	/**
// 	* 判断自定义的分账关系
// 	* @return true 或 false
// 	**/
// 	public function IsCustom_relationSet()
// 	{
// 		return array_key_exists('custom_relation', $this->values);
// 	}
	
}
