<?php 
/**
 * 企业付款到银行卡用例，只支付到个人借记卡，不支付对公账户付款
 * date 2020-08-26
 */
   function wxPayBank(){
    	$pub_key = getPubKey();
    	if (empty($pub_key)){
    		echo '公钥获取失败<br>';
    	}

    	$bank_no = '6222xxxxxxxxxxxx'; //银行卡
    	$bank_account_name = '张三';
    	
    	$bank_no =  publicEncrypt($bank_no,$pub_key);
    	$bank_account_name =  publicEncrypt($bank_account_name,$pub_key);
    	if(!$bank_no || !$bank_account_name){
    		echo '加密失败<br>';
    	}

    	
    	$amount = 1;//1分
    	$bank_code = '1002';//工商银行，银行编码找对应微信官方文档查询
    	//https://pay.weixin.qq.com/wiki/doc/api/tools/mch_pay.php?chapter=24_4
    	$trade_no = date("ymdHis",time()); //商户订单号
    
    	
    	$input = new WxWorkPayBankOrder();
    	$input->SetMch_id(WxPayConfig::MCHID);//商户号
    	$input->SetPartner_trade_no($trade_no);//商户订单号
    	$input->SetEnc_bank_no($bank_no);//收款方银行卡号
    	$input->SetEnc_true_name($bank_account_name);//收款方用户名
    	$input->SetBank_code($bank_code);//收款方开户行
    	$input->SetAmount($amount);//金额
    	$input->SetDesc('测试付款');//付款描述信息
    	
    	//调用付款接口
     	$response = WxPayApi::workpaybank($input);
     	$resultString = json_encode($response);
    	 
    	print_r($response);
    	
    }
    
    /**
     * 生成并获取公钥
     * @return unknown|NULL
     */
     function getPubKey(){
    	$rsafile = '/data1/cart/ras/public-rsa-pks1.pem';
    	if (!is_file($rsafile)){
    		$input = new WxRsa();
    		$input->SetMch_id(WxPayConfig::MCHID);//商户号
    		$input->SetSign_type('MD5');//签名类型
    		 
    		$response = WxPayApi::getrsa($input);
    		$resultString = json_encode($response);
    		if ($response['return_code'] == 'SUCCESS' && $response['result_code'] == 'SUCCESS'){
    			if (isset($response['pub_key'])){
    				file_put_contents($rsafile,$response['pub_key']);
    				return $response['pub_key'];
    			}
    			else{
    				return null;
    			}
    		}
    		else{
    			return null;
    		}
    
    	}else{
    		return file_get_contents($rsafile);
    	}
    }
    
    /**
     * 进行rsa加密并转base64之后的密文
     * @param unknown $data
     * @param unknown $pub_key
     * @return boolean
     */
     function _publicEncrypt($data,$pub_key){
    	// 进行加密
    	$pubkey = file_get_contents('/data1/cart/ras/public-rsa-pks8.pem');
    	$encrypt_data = '';
    	$encrypted = '';
    	$r = openssl_public_encrypt($data,$encrypt_data,$pubkey,OPENSSL_PKCS1_OAEP_PADDING);
    	if($r){//加密成功，返回base64编码的字符串
    		return base64_encode($encrypted.$encrypt_data);
    	}
    	else{
    		return false;
    	}
    }

//企业付款调用
wxPayBank();


//付款成功结果
/*
Array
(
		[return_code] => SUCCESS
		[return_msg] => 支付成功
		[result_code] => SUCCESS
		[err_code] => SUCCESS
		[err_code_des] => 微信侧受理成功
		[nonce_str] => 6786u4a79guh42tnbuh7vnquf328ioqo
		[mch_id] => 1488406582
		[partner_trade_no] => 2006171717535344
		[amount] => 1
		[payment_no] => 10000478340292020061702861094199753
		[cmms_amt] => 100
)

*/
?>
