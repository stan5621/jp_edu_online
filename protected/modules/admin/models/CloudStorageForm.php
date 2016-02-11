<?php

/**
 * MailerForm class.
 * MailerForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class CloudStorageForm extends CFormModel
{
	public $storage;
	public $accessKey;
	public $secretKey;
	public $bucket;
	public $apiServer;
	public $uploadServer="http://up.eduwind.com";
	public $cloudServer="http://www.eduwind.com/index.php?r=cloudServer";
	/**
	 * Declares the validation rules.
	 * The rules status that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('accessKey,secretKey,bucket,cloudServer,storage,apiServer', 'required'),
			array('apiServer,uploadServer', 'url'),
		);
	}
	
	public function behaviors(){
		return array(
				'setting'=>array('class'=>'SettingBehavior',
								 'item'=>'cloudStorage'),		
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'storage'=>'视频保存方式',
			'accessKey'=>'云存储AccessKey',
			'secretKey'=>'云存储SecretKey',
			'bucket'=>'云存储Bucket',
			'cloudServer'=>'云存储服务器域名',
			'apiServer'=>'云存储API接口地址',
		);
	}

}
