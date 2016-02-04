<?php
?>
<div class="row">
<div class="span8 center">
	<div class="well">
	<?php 
$this->renderPartial('_header');
?>		<br/>
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'course-rate-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,),
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

<h4>网站与管理员设置</h4>
<?php 

 echo $form->textFieldRow($model, 'name',array('class'=>'span4','value'=>'EduWind'));
 echo $form->textFieldRow($model, 'subTitle',array('class'=>'span4','value'=>'又一个EduWind站点'));
 echo $form->textFieldRow($model, 'adminName',array('class'=>'span4','value'=>'windwalker'));
  echo $form->textFieldRow($model, 'adminEmail',array('class'=>'span4','value'=>'XXX@XXX.com'));
   echo $form->textFieldRow($model, 'adminPassword',array('class'=>'span4','value'=>'XXXXXX'));
  
?>
<h4>邮件服务器设置</h4>
<?php 
 echo $form->textFieldRow($mailer, 'host',array('class'=>'span4','value'=>'smtp.163.com'));
  echo $form->textFieldRow($mailer, 'username',array('class'=>'span4','value'=>'eduwind@163.com'));
  echo $form->textFieldRow($mailer, 'password',array('class'=>'span4','value'=>'eduwinduser'));
   echo $form->textFieldRow($mailer, 'port',array('class'=>'span4','value'=>'25'));
  
?>

		<div class="text-center">
		<?php echo CHtml::submitButton('下一步',array('class'=>'btn btn-primary ')); ?>
		</div>

<?php $this->endWidget();?>
	</div>
</div>
</div>