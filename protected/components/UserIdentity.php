<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate($Oauth=false)
	{
		$user = User::model()->findByAttributes(array('email'=>$this->username));
		if(!$user)
		$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(!$user->comparePassword($this->password) && !$Oauth)
		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->errorCode=self::ERROR_NONE;
				
			$userInfo = UserInfo::model()->findByAttributes(array('email'=>$this->username));
			$userInfo->upTime = time();
			$userInfo->save();
			if($userInfo->status=='frozened'){
				throw new CHttpException(404,'错误！你的账号已被冻结.');
				Yii::app()->end();
			}
			//动态设为超级用户
			if($userInfo->isAdmin) Yii::app()->user->setIsSuperuser(true);
//			elseif($userInfo->inRoles(array('superAdmin','admin'))) Yii::app()->user->setIsSuperuser(true);

			$this->_id = $userInfo->id;
			//用setState添加的变量会加入Yii::app()->user的属性中
			$this->setState('displayName',$userInfo->name);

		}
		return !$this->errorCode;
	}
	//Yii::app()->user->id会调用此函数
	public function getId()
	{
		return $this->_id;
	}

}