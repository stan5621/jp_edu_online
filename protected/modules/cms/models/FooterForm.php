<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class FooterForm extends CFormModel
{
    public $html;
        /**
     * @var string 默认的网站底部文本
     */
    public static $defaultHtml = '
<div style="margin-top:40px;margin-bottom:20px">
<div class="span3 offset1" style="color:#FFF;margin-right:45px ">
    <h3>关于我们</h3>
    <p>
        这是一个使用EduWind搭建的MOOC网站<br>
        你可以在这里学习你喜爱的课程
    </p>
</div>

<div class="span3 " style="color:#FFF; margin-right:45px">
    <h3>联系合作</h3>
    <p><a style="color:#FFF" href="#">联系我们</a></p>
    <p><a style="color:#FFF" href="#">合作方式</a></p>
</div>

<div class="span3"  style="color:#FFF; margin-right:45px">
    <h3>关注我们</h3>
    <p><a style="color:#FFF" href="#">微博</a></p>
    <p><a style="color:#FFF" href="#">微信</a></p>
</div>
<div class="clearfix"></div>
</div>
';
	/**
	 * Declares the validation rules.
	 * The rules status that username and password are required,
	 * and password needs to be authenticated.
	 */
    // @todo 提交表单不执行rule
	public function rules()
	{
		return array(
            array('html', 'filter', 'filter'=>array($obj=new CHtmlPurifier(), 'purify')),
		);
	}
	
	public function behaviors(){
		return array(
				'setting'=>array('class'=>'SettingBehavior', 'item'=>'footer'),		
		);
	}

	public function setDefault(){
		$this->html = self::$defaultHtml;
	}
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
            'html'  =>  '底部HTML',
		);
	}

}
