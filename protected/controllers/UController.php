<?php

class UController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		//			'rights',
		);
	}

	public function actions() {
		return array('toggleFollow'=>array(
					'class'=>'application.components.actions.ToggleFollowAction',
		));
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('registerOauth','tmpEmailVerify','uploadFace','cropFace'),
				'users'=>array('@'),
		),
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'users'=>array('*',),
		)
		);
	}

	public function allowedActions()
	{
		return 'index, view';
	}

	public function actionIndex($id){
        $user = $this->loadModel($id);

		$courseDataProvider = new CArrayDataProvider($user->coursesOk);
		//		$questionDataProvider = new CArrayDataProvider($user->questions,array('keyField'=>'id'));
		//		$answerDataProvider = new CArrayDataProvider($user->answers,array('keyField'=>'id'));

		$this->render("index",array("user"=>$user,
									'courseDataProvider'=>$courseDataProvider,
		//									'questionDataProvider'=>$questionDataProvider,
		//									'answerDataProvider'=>$answerDataProvider
		));
	}
	/**
	 * 显示用户名片信息
	 */
	public function actionHoverCard(){
		$userId = isset($_POST['userid']) ? $_POST['userid'] :  $_POST['userId'];
		$user= UserInfo::model()->findByPk($userId);
		// 		Yii::app()->clientScript->scriptMap['*.js'] = false;
		$this->renderPartial('hovercard',array('user'=>$user),false,true );
	}

	/*
	 public function actionToCount(){
		$users = UserInfo::model()->findAll();
		foreach($users as $user){
		$user->answerVoteupNum = $user->getAnswerVoteupCount();
		$user->count_answer = $user->answerCount;
		$user->count_fan = $user->fanCount;
		$user->save();
		if($user->answerVoteupNum>0) echo $user->id."/".$user->answerVoteupNum."<br/>";
		}
		}*/
	/**
	 * 用户注册
	 * Enter description here ...
	 */
	public function actionRegister()
	{
		$model=new RegisterForm('register');
		global $sysSettings;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['RegisterForm']))
		{
			$model->attributes=$_POST['RegisterForm'];
			//		if($model->validate()) error_log('validate success');
			if($model->validate() && $model->register())
			// $this->render('register_verify',array('model'=>$model));
			//      		 error_log("register success");
			if(isset($sysSettings['mailer']['enabled']) && !$sysSettings['mailer']['enabled']){
				$userInfo = UserInfo::model()->findByAttributes(array('email'=>$model->email));
				$userInfo->status = "ok";
				$userInfo->save();
				$user = User::model()->findByPk($userInfo->id);
				$user->loginWithoutPassword();
				$this->render("register_face",array('id'=>$user->id,'userInfo'=>$userInfo));	
			}
			else $this->redirect(array("u/verify","email"=>urlencode($model->email)));
			//Yii::app()->end();
		}


		$this->render('register',array(
			'model'=>$model
		));
	}


	/**
	 * 邮箱验证注册
	 * Enter description here ...
	 */
	public function actionVerify($email="",$verifyCode="")
	{
		$email = urldecode($email);
		$userInfo = UserInfo::model()->findByAttributes(array('email'=>$email));
		if($userInfo->status=='frozened'){
			throw new CHttpException(404,'错误！你的账号已被冻结.');
			Yii::app()->end();
		}
		//var_dump($userInfo);
		//发送邮件
		if(!$verifyCode && ($userInfo->status=="created"||$userInfo->status="verifying")){

			if($userInfo->verifyCode=="") {
				$userInfo->verifyCode = DxdUtil::randCode(32);
			}
			$userInfo->status = "verifying";
			$userInfo->save();

			$subject = Yii::app()->params['settings']['site']['name'].'邮箱验证';
			$url = Yii::app()->createAbsoluteUrl('u/verify',array('verifyCode'=>$userInfo->verifyCode,'email'=>urlencode($userInfo->email)));
			$content = $userInfo->name."，你好：<br /><br/>".
						'&nbsp;&nbsp;&nbsp;&nbsp;感谢你注册'.Yii::app()->params['settings']['site']['name'].'，点击以下链接进完成邮箱验证：<br/><br/>'.
						'&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.$url.'">'.$url.'</a><br/>'.
						'&nbsp;&nbsp;&nbsp;&nbsp;（如果链接无法点击，请将它拷贝到浏览器地址栏中）<br/><br/>'.
						'&nbsp;&nbsp;&nbsp;&nbsp;你的'.Yii::app()->params['settings']['site']['name'].'帐号是 '.$userInfo->email.'<br/><br/>';

			DxdUtil::postMail($userInfo->email, $subject, $content);
			$this->render('register_verify',array('user'=>$userInfo));
			Yii::app()->end();
		}

		if($userInfo->verifyCode==$verifyCode && $userInfo->status="verifying"){
			//验证邮件
			$userInfo->verifyCode="";
			$userInfo->status="ok";
			$userInfo->save();
				
			$user = User::model()->findByPk($userInfo->id);
			$user->loginWithoutPassword();

			$this->render("register_face",array('id'=>$user->id,'userInfo'=>$userInfo));
		}

	}

	public function actionUploadFace(){
		$user = UserInfo::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		if(isset($_POST['UserInfo'])){
			$user->attributes = $_POST['UserInfo'];
			$user->save();
			$this->redirect(array('cropFace'));
		}
	}

	public function actionCropFace(){
		$user = UserInfo::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		if(!$user->face || $user->face==$user->defaultFace) {
			Yii::app()->user->setFlash('success',"欢迎 $user->name 加入！");
			$this->redirect(Yii::app()->baseUrl."/");
			Yii::app()->end();
		}
		if(isset($_POST['imageId_x'])){
			Yii::import('ext.jcrop.EJCropper');
			$jcropper = new EJCropper();
			$jcropper->thumbPath = dirname($user->face)."/thumbs";
			if(!file_exists($jcropper->thumbPath)) DxdUtil::createFolders($jcropper->thumbPath);

			// get the image cropping coordinates (or implement your own method)
			$coords = $jcropper->getCoordsFromPost('imageId');
			// returns the path of the cropped image, source must be an absolute path.
			$thumbnail = $jcropper->crop( $user->face, $coords);
			if($thumbnail){
				unlink($user->face);
				$user->face = $thumbnail;
				$user->save();
			}
			Yii::app()->user->setFlash('success',"欢迎 $user->name 加入！");
			$this->redirect(Yii::app()->baseUrl."/");
			//	echo $jcropper->thumbPath;			
		//	echo $thumbnail;
		}
		$this->render('register_crop_face',array('user'=>$user));
	}


	/**
	 * 关注或取消关注
	 * Enter description here ...
	 * @param unknown_type $followed_userId
	 */
	/*	public function actionToggleFollow($followed_userId){
		$follow = UserFollow::model()->findByAttributes(array('follow_userId'=>Yii::app()->user->id,'followed_userId'=>$followed_userId));
		if(!$follow){
		$follow = new UserFollow;
		$follow->follow_userId = Yii::app()->user->id;
		$follow->followed_userId = $followed_userId;
		$follow->addTime = time();
		if($follow->save()){
		$notice = new Notice;
		$notice->type = 'user_follow';
		$notice->setData(array('userId'=>$follow->follow_userId,'followid'=>$follow->getPrimaryKey()));
		$notice->userId = $follow->followed_userId;
		$result = $notice->save();
		echo true;
		//				Yii::app()->end();
		}
		}else{
		$follow->delete();
		echo false;
		}
		//更新用户粉丝数量
		$user = UserInfo::model()->findByPk( $followed_userId);
		$user->count_fan = $user->fanCount;
		$user->save();
		}

		*/
	
	public function actionFetchNames($term){
		$criteria=new CDbCriteria;
		$criteria->compare('name',$term,true);

		$dataProvider = new CActiveDataProvider("UserInfo", array(
			'criteria'=>$criteria,
		));
		$users = $dataProvider->getData();
		$items=array();
		foreach($users as $user){
			$items[] = $user->name;			
		}
		echo json_encode($items);
	}
	/**
	 * 社交网站登录后补充信息
	 * Enter description here ...
	 */
	public function actionRegisterOauth(){
		$userInfo = UserInfo::model()->findByPk(Yii::app()->user->id);
		$user = User::model()->findByPk(Yii::app()->user->id);
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='info-form')
		{
			echo CActiveForm::validate($userInfo);
			Yii::app()->end();
		}

		if(isset($_POST['UserInfo'])){
			$userInfo->attributes = $_POST['UserInfo'];
			$user->attributes = $_POST['User'];
			//保存信息
			//			$userinfo->email = $userInfo->email;
			//			$userinfo->introduction = $userInfo->introduction;
			//	$user = User::model()->findByPk($userInfo->id);
			$user->email = $userInfo->email;

			if($userInfo->save() && $user->save()){
				Yii::app()->user->setFlash('success','保存成功！');
			}else{
				Yii::app()->user->setFlash('error','保存失败！！');
			}
			$this->redirect(array('site/index'));
			Yii::app()->end();
		}
		$this->render('registerOauth',array('user'=>$user,'userInfo'=>$userInfo));
	}
	/*
	 * 验证临时邮箱
	 */
	/*	public function actionTmpEmailVerify($email="",$verifyCode=""){
		//
		if($email &&$verifyCode){
		$user = UserInfo::model()->findByAttributes(array('tmp_email'=>$email));
		if($user->verifyCode==$verifyCode){
		$user->email = $email;
		if($user->save()){
		$this->render("register_verify",array('success'=>true));
		Yii::app()->end();
		}
		}
		}
		Yii::import('ext.email.Email');
		$user = UserInfo::model()->findByPk(Yii::app()->user->id);
		$email = new Email;
		$email->subject = '大西岛邮箱验证';
		$url = $this->createAbsoluteUrl('u/tmpEmailVerify',array('verifyCode'=>$user->verifyCode,'email'=>urlencode($user->email)));
		$email->content = $user->name."，你好：<br /><br/>".
		'&nbsp;&nbsp;&nbsp;&nbsp;感谢你注册大西岛，点击以下链接进完成邮箱验证：<br/><br/>'.
		'&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.$url.'">'.$url.'</a><br/>'.
		'&nbsp;&nbsp;&nbsp;&nbsp;（如果链接无法点击，请将它拷贝到浏览器地址栏中）<br/><br/>'.
		'&nbsp;&nbsp;&nbsp;&nbsp;你的大西岛网帐号是 '.$user->email.'<br/><br/>';
		$email->toAddr = $user->tmp_email;
		$email->send('trans');
		$this->redirect("/");
		}*/
	/**
	 * 忘记密码
	 * Enter description here ...
	 */
	public function actionForgetPassword(){
		$model = new UserInfo;
		if(isset($_POST['UserInfo'])){
			$model->attributes = $_POST['UserInfo'];
			$user = User::model()->findByAttributes(array('email'=>$model->email));
			if(!$user){
			}else{
				$user->resetPassword = DxdUtil::randCode(32);
				if($user->save()){
					$link = $this->createAbsoluteUrl('u/resetPassword',array('resetPassword'=>$user->resetPassword,'email'=>urldecode($user->email)));
					//Yii::import('ext.email.Email');
					//$email = new Email;
					$subject = Yii::app()->params['settings']['site']['name']."-密码找回";
					$content = $this->renderPartial('_forget_password_email_content',array('link'=>$link),true);
					$toAddr = $user->email;
					if(DxdUtil::postMail($toAddr, $subject, $content)){
						$this->render('forgetPasswordSend',array('user'=>$user),false);
						//				Yii::app()->end();
						//		$this->redirect(array('site/index'));
					}
				}
			}
		}else{
			$this->render('forgetPassword',array('model'=>$model));
		}
	}



	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];

			$user = UserInfo::model()->findByAttributes(array('email'=>$model->username));
			//刚创建或尚未验证
			if(isset($user->status) && ($user->status=="verifying"||$user->status=="created")){
				$this->redirect(array("//u/verify",'email'=>$user->email));
				Yii::app()->end();
			}
			//被冻结
			if(isset($user->status) && $user->status=="frozen"){
				$this->redirect(array("//u/froze",'user'=>$user->email));
				Yii::app()->end();
			}


			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				//				error_log("return Url  ".Yii::app()->user->returnUrl);
				//用户登录后，如果没有指定returnUrl（即returnUrl为默认值index.php)，即返回到个人主页
				$returnUrl = Yii::app()->user->returnUrl;
				//				if(strrpos($returnUrl,'index.php')==strlen($returnUrl)-9)
				//					$returnUrl = array("/me/index");
				$this->redirect($returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}



	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * 重设密码
	 * Enter description here ...
	 * @param unknown_type $resetPassword
	 * @param unknown_type $email
	 */
	public function actionResetPassword($resetPassword,$email){
		$model = User::model()->findByAttributes(array('email'=>urldecode($email),'resetPassword'=>$resetPassword));
		if(isset($_POST['User'])){
			$model->attributes = $_POST['User'];
			$model->resetPassword = DxdUtil::randCode(32);
			if($model->save()){
				Yii::app()->user->setFlash('success','密码重设成功');
				$this->redirect(array('//u/login'));
			}else{
				Yii::app()->user->setFlash('error','抱歉，密码重设失败！');
			}
		}

		$this->render('resetPassword',array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserInfo::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
