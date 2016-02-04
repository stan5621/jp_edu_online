<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>


<div class="row">
	<div class="span4 well center" style="margin-top:100px">
	<h2 class="text-center">出错了！</h2>

<div class="error">
<p>错误代号：<?php  echo $code;?></p>
<p>错误信息：<?php echo CHtml::encode($message); ?></p>
</div>
	</div>
</div>