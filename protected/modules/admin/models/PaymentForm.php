<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class PaymentForm extends CFormModel
{
	public $aliGuaranPartner;
	public $aliGuaranKey;	
	public $means;
//	public $aliGuaranEnabled;
	public $aliGuaranSellerAccount;
	
	public $aliPartner;
	public $aliKey;
	public $aliSellerAccount;
		
	/**
	 * Declares the validation rules.
	 * The rules status that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('aliGuaranKey,aliKey', 'length', 'max'=>32),
			array('aliGuaranPartner,aliPartner','length','max'=>16),
			array('aliGuaranSellerAccount,aliSellerAccount','length','max'=>64),
			array('means','length','max'=>255),
			//array('','numerical', 'integerOnly'=>true),
		);
	}
	
	public function behaviors(){
		return array(
				'setting'=>array('class'=>'SettingBehavior',
								 'item'=>'payment'),		
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'aliGuaranSellerAccount'=>'收款账号',
			'aliGuaranPartner'=>'合作伙伴id',
			'aliGuaranKey'=>'安全检验码',
			'aliSellerAccount'=>'收款账号',
			'aliPartner'=>'合作伙伴id',
			'aliKey'=>'安全检验码',
			'means'=>'支付工具',
			'aliEnabled'=>'是否使用支付宝',
		);
	}

}
