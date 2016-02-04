<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CActiveRecord
//class RegisterForm extends CFormModel
{
	public $name;
	public $password;
	public $email;
	public $bio;
    public $password2;


    public function tableName()
    {
        return '{{user}}';
    }

	/**
	 * Declares the validation rules.
	 * The rules status that name and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
		// name and password are required
		array('name, email, password, password2, bio', 'required'),
		array('email','unique','className'=>'User'),
		array('name','unique','className'=>'UserInfo'),
		array('password','length','min'=>6,'max'=>32),
        array('password2', 'compare', 'compareAttribute'=>'password', 'message'=>'两次 密码 不一致'),
		array('name','length','min'=>2,'max'=>32),
		array('bio','length','min'=>1,'max'=>200),
		array('email','email'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'姓名',
			'password'=>'密码',
			'password2'=>'重复密码',
			'email'=>'邮箱地址',
			'bio'=>'一句话介绍你自己',
        );
	}


	/**
	 * Logs in the user using the given name and password in the model.
	 * @return boolean whether login is successful
	 */
	public function register()
	{
		$user = new User;
		$userInfo = new UserInfo;
		$user->email = $this->email;
		$user->plainPassword = $this->password;
		if($user->save()){
			$userInfo->id = $user->getPrimaryKey();
			$userInfo->email = $user->email;
			$userInfo->name = $this->name;
			$userInfo->bio = $this->bio;
//			$userInfo->status="created";
			$userInfo->addTime = time();
			$userInfo->status="created";
			if($userInfo->save()){
				/**
				 * added by lsy 20130819
				 * assign roles after registration HERE
				 */
			//	$authorizer = Yii::app()->getModule("rights")->getAuthorizer();
			//	$authorizer->authManager->assign('Authenticated', $userInfo->id);
				/**
				 * added by lsy 20130819
				 */
				//注册成功后自动登录
				//$identity=new UserIdentity($this->email,$this->password);
				//$identity->authenticate();
				//Yii::app()->user->login($identity,0);
	//			Yii::import("ext.sendcloud.ESendCloud");
			//	$sendCloud = new ESendCloud();
				return true;
			}else{
				$user->delete();
			}

		}
		return false;
	}
}
