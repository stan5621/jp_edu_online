<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SiteForm extends CFormModel
{
	public $icp;
	public $name="EduWind";
	public $subTitle="又一个EduWind站点";
	public $superAdminEmail;
	public $analytic;
	public $version = "1.6.3";
	public $startVersion = "1.6.3";
	public $copyright = "北京水木信步网络科技有限公司";
	public $urlFormat = "query";
	public $install = false;
	public $logo;
	public $poweredBy="EduWind";
	public $poweredByUrl = "http://eduwind.com";
	/**
	 * Declares the validation rules.
	 * The rules status that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('name,icp,subTitle,adminEmail,urlFormat,version', 'length', 'max'=>64),
			array('logo,poweredBy,poweredByUrl','length','max'=>512),
			array('analytic','length','max'=>64000),
		);
	}
	
	public function behaviors(){
		return array(
				'setting'=>array('class'=>'SettingBehavior',
								 'item'=>'site'),		
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'icp'=>'ICP备案号',
			'name'=>'网站名称',
			'subTitle'=>'网站副标题',
			'urlFormat'=>'URL格式',
			'superAdminEmail'=>'超级管理员邮箱',
			'analytic'=>'站点统计代码',
			'logo'=>'Logo',
			'poweredBy'=>'Powered By',
			'poweredByUrl'=>'Powered By 链接',
		);
	}

}
