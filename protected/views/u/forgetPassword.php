<?php
/* @var $this UserController */
/* @var $model UserInfo */

?>

<h2>邮箱找回密码</h2>
<hr/>
<div class="row">
	<div class="span4 center" style="margin-top:20px;">

<?php
/* @var $this UserController */
/* @var $model UserInfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forget-form',
//	'enableAjaxValidation'=>TRUE,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	)
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>64,'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('发送邮件',array('class'=>'btn  btn-success btn-block')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


	</div>

	
</div>

