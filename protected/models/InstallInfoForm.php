<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class InstallInfoForm extends CFormModel
{
	public $name;
	public $subTitle;
	public $adminEmail;
	public $adminPassword;
	public $adminName;
	public $adminBio = "管理员";
	
	/**
	 * Declares the validation rules.
	 * The rules status that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('name,adminEmail,adminName,adminPassword', 'required'),
			array('adminEmail, adminName,subTitle', 'length', 'max'=>64),
			array('adminEmail','email'),
			array('adminName,email','unique','className'=>'UserInfo','attributeName' => 'email'),			
			array('adminPassword','length','max'=>32,'min'=>5)
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'adminName'=>'管理员名号',
			'adminEmail'=>'管理员邮箱',
			'adminPassword'=>'管理员密码',
			'name'=>'网站名称',
			'subTitle'=>'网站副标题',
		);
	}
}
