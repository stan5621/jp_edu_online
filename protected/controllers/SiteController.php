<?php

class SiteController extends Controller
{
//		public $layout='//layouts/column1';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$groupDataProvider = new CActiveDataProvider('Group',array('criteria'=>array('condition'=>'status="ok"','order'=>'memberNum desc,addTime desc'),'pagination'=>array('pageSize'=>4)));
	//	$courseDataProvider = new CActiveDataProvider('Course',array('criteria'=>array('order'=>'addTime desc'),'pagination'=>array('pageSize'=>4)));
		$courseDataProvider=new CActiveDataProvider('Course',array(
			'criteria'=>array('with'=>array('user'),'order'=>'studentNum desc','condition'=>'t.status='.Course::STATUS_OK),
			'pagination'=>array(
        		'pageSize'=>4,
		)));
		$postDataProvider=new CActiveDataProvider('Post',array(
			'criteria'=>array('order'=>'upTime desc'),
			'pagination'=>array(
        		'pageSize'=>5,
		)));
		$linkDataProvider = new CActiveDataProvider('FriendLink',array('criteria'=>array('order'=>'weight asc'),'pagination'=>array('pageSize'=>100)));
		$newbieDataProvider = new CActiveDataProvider('UserInfo',array('criteria'=>array('order'=>'addTime desc'),'pagination'=>array('pageSize'=>5)));
		
		$this->render('index',array('groupDataProvider'=>$groupDataProvider,
									'courseDataProvider'=>$courseDataProvider,	
									'newbieDataProvider'=>$newbieDataProvider,
									'postDataProvider'=>$postDataProvider,
									'linkDataProvider'=>$linkDataProvider,
		));
	}
	
	/**
	 * 浏览器不支持
	 */
	public function actionBrowserNotSupport(){
		Yii::import('ext.ewebbrowser.EWebBrowser');
		$browser = new EWebBrowser();
		if(!($browser->browser==EWebBrowser::BROWSER_IE && $browser->version<9)){
			$this->redirect(array('me/index'));
			Yii::app()->end();
		}
		$this->render('browserNotSupport');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

}