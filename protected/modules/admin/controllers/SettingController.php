<?php

class SettingController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin/nonav_column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
		//			'accessControl', // perform access control for CRUD operations
		//			'postOnly + delete', // we only allow deletion via POST request
			'rights',
		);
	}

	public function actions(){
		return array(
//		'site'=>array('class'=>'application.components.actions.UpdateSettingAction','viewFile'=>'site','className'=>'SiteForm'),
		'carousel'=>array('class'=>'application.components.actions.UpdateSettingAction','viewFile'=>'carousel','className'=>'CarouselForm'),
		'openAuth'=>array('class'=>'application.components.actions.UpdateSettingAction','viewFile'=>'open_auth','className'=>'OpenAuthForm'),
		'payment'=>array('class'=>'application.components.actions.UpdateSettingAction','viewFile'=>'payment','className'=>'PaymentForm'),
		'upgrade'=>array('class'=>'application.components.actions.UpdateSettingAction','viewFile'=>'upgrade','className'=>'UpgradeForm'),
		'mailer'=>array('class'=>'application.components.actions.UpdateSettingAction','viewFile'=>'mailer','className'=>'MailerForm'),	
		'cloudStorage'=>array('class'=>'application.components.actions.UpdateSettingAction','viewFile'=>'cloud_storage','className'=>'CloudStorageForm'),
		'theme'=>array('class'=>'application.components.actions.UpdateSettingAction','viewFile'=>'theme','className'=>'ThemeForm'),
		);

	}

	public function actionSite($power=false){
		$model = new SiteForm();
		$model->getSetting();
		
		if(isset($_POST['SiteForm'])){
			$model->attributes = $_POST['SiteForm'];
			$uploadFile = CUploadedFile::getInstance($model, 'logo');
			if($uploadFile !== null){
				$uploadFileName = "logo_".time() . '.' . $uploadFile->getExtensionName();
				if(file_exists($model->logo)) unlink(Yii::app()->basePath."/../".$model->logo);
				if(!is_dir(Yii::app()->basePath."/../uploads/setting/site")) DxdUtil::createFolders(Yii::app()->basePath."/../uploads/setting/site");
				$model->logo = 'uploads/setting/site/'.$uploadFileName;
				$uploadFile->saveAs(Yii::app()->basePath."/../".$model->logo);
				
			}
			//			var_dump($_POST['SiteForm']);
			if($model->saveSetting()){
				Yii::app()->user->setFlash('success','保存成功！');
			}else{
				Yii::app()->user->setFlash('error','保存失败！');
			}
		}
		if(!$power){
			$this->render('site',array('model'=>$model));
		}else{
			$this->render('power',array('model'=>$model));
		}
	}
	
	public function getThemes(){
		$themeRoot = Yii::app()->basePath."/../themes";
		$themes=array();
		$themes[] =array('name'=>'default');
		$dir = opendir($themeRoot);
		while(($file=readdir($dir))!==false){
			if($file!="." && $file!=".." && is_dir("$themeRoot/$file")){
				$infoFile = "$themeRoot/$file/info.php";
				if(is_file($infoFile)){
//					Yii::import($moduleFile);
					$theme = include $infoFile;
					$theme['name'] = $file;
					$themes[] = $theme;
				}
			}
		}
		return $themes;
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	/*	public function accessRules()
	 {
		return array(
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
		'actions'=>array('site','openAuth','carousel'),
		'users'=>array('@'),
		),
		array('deny',  // deny all users
		'users'=>array('*'),
		),
		);
		}
		*/
	/**
	 * 网站设置
	 */
	/*	public function actionSite(){
		$siteForm = new SiteForm;
		if(isset($_POST['SiteForm'])){
		$siteForm->attributes = $_POST['SiteForm'];
		//			var_dump($_POST['SiteForm']);
		if($siteForm->saveSetting()){
		Yii::app()->user->setFlash('success','保存成功！');
		}else{
		Yii::app()->user->setFlash('error','保存失败！');
		}
		}
		$siteForm->getSetting();
		$this->render('site',array('model'=>$siteForm));
		}

		/**
	 * 网站设置
	 */
	/*	public function actionUpgrade(){
		$upgradeForm = new UpgradeForm;
		if(isset($_POST['UpgradeForm'])){
		$upgradeForm->attributes = $_POST['UpgradeForm'];
		//			var_dump($_POST['SiteForm']);
		if($upgradeForm->saveSetting()){
		Yii::app()->user->setFlash('success','保存成功！');
		}else{
		Yii::app()->user->setFlash('error','保存失败！');
		}
		}
		$upgradeForm->getSetting();
		$this->render('upgrade',array('model'=>$upgradeForm));
		}


		/**
	 * 邮件服务器设置
	 */
	/*	public function actionMailer(){
		$mailerForm = new MailerForm;
		if(isset($_POST['MailerForm'])){
		$mailerForm->attributes = $_POST['MailerForm'];
		//			var_dump($_POST['SiteForm']);
		if($mailerForm->saveSetting()){
		Yii::app()->user->setFlash('success','保存成功！');
		}else{
		Yii::app()->user->setFlash('error','保存失败！');
		}
		}
		$mailerForm->getSetting();
		$this->render('mailer',array('model'=>$mailerForm));
		}

		public function actionPayment(){
		$paymentForm = new PaymentForm;
		if(isset($_POST['PaymentForm'])){
		$paymentForm->attributes = $_POST['PaymentForm'];
		//			var_dump($_POST['SiteForm']);
		if($paymentForm->saveSetting()){
		Yii::app()->user->setFlash('success','保存成功！');
		}else{
		Yii::app()->user->setFlash('error','保存失败！');
		}
		}
		$paymentForm->getSetting();
		$this->render('payment',array('model'=>$paymentForm));
		}

		/**
	 * 开放登录设置
	 */
	/*	public function actionOpenAuth(){
		$openAuthForm = new OpenAuthForm;
		if(isset($_POST['OpenAuthForm'])){
		$openAuthForm ->attributes = $_POST['OpenAuthForm'];
		if($openAuthForm ->saveSetting()){
		Yii::app()->user->setFlash('success','保存成功！');
		}else{
		Yii::app()->user->setFlash('error','抱歉，保存失败！');
		}
		}
		$openAuthForm ->getSetting();
		$this->render('open_auth',array('model'=>$openAuthForm ));
		}

		/**
	 * 首页carousel设置
	 */
	/*	public function actionCarousel(){
		$carouselForm = new CarouselForm();
		if(isset($_POST['CarouselForm'])){
		$carouselForm ->attributes = $_POST['CarouselForm'];
		if($carouselForm ->saveSetting()){
		Yii::app()->user->setFlash('success','保存成功！');
		}else{
		Yii::app()->user->setFlash('error','抱歉，保存失败！');
		}
		}
		$carouselForm ->getSetting();
		$this->render('carousel',array('model'=>$carouselForm ));
		}*/
}
