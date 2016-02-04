<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<div class="span4 center " style="margin-top:60px">
<h2 style="text-align:center">登陆<?php Yii::app()->params['settings']['site']['name'];?></h2>
<?php $this->renderPartial("_login_form",array('model'=>$model));?>
</div><!-- form -->
