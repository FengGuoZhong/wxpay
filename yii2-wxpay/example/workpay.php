<?php 
/**
 * 企业付款用例
 * date 2020-08-26
 */
function wxPayUser(){
	$amount = 30;//3毛钱，因为微信企业付最低为3毛钱
	$trade_no = date("ymdHis",time()); //商户订单号
	 
	$input = new WxWorkPayOrder();
	$input->SetMch_appid('appid');//商户账号appid(绑定的小程序appid)
	$input->SetMch_id('mch_id');//微信商户号
	 
	$input->SetPartner_trade_no($trade_no);//商户订单号
	$input->SetOpenid('openid');//用户的微信openid
	$input->SetCheck_name('FORCE_CHECK');//校验用户姓名选项  NO_CHECK
	$input->SetRe_user_name('张三');//收款用户姓名
	$input->SetAmount($amount);//金额
	$input->SetDesc('付款测试');//企业付款描述信息
	$input->SetSpbill_create_ip('210.12.123.41');//客户端Ip地址

	$response = WxPayApi::workpay($input);
	$resultString = json_encode($response);

	print_r($response);
}

//企业付款调用
wxPayUser();


//付款成功结果
/*
Array
(
	[mch_appid] => wxcbf5ccbe72fab31b
	[mchid] => 1488406582
	[nonce_str] => mli3m6l89gsuhbv4cp9hega9xnq1d6hx
	[partner_trade_no] => 2008261126482650
	[payment_no] => 10100478340292008265843622912753
	[payment_time] => 2020-08-26 11:26:49
	[result_code] => SUCCESS
	[return_code] => SUCCESS
	[return_msg] => Array()
)

Array
(
	[return_code] => SUCCESS
	[return_msg] => 支付失败
	[mch_appid] => wxcbf5ccbe72fab31b
	[mchid] => 1488406582
	[result_code] => FAIL
	[err_code] => AMOUNT_LIMIT
	[err_code_des] => 付款金额超出限制。低于最小金额0.30元或累计超过5000.00元。
)

*/
?>
