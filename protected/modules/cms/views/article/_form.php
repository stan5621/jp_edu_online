<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'entityId'); ?>
		<?php echo $form->textField($model,'entityId'); ?>
		<?php echo $form->error($model,'entityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postTime'); ?>
		<?php echo $form->textField($model,'postTime'); ?>
		<?php echo $form->error($model,'postTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addTime'); ?>
		<?php echo $form->textField($model,'addTime'); ?>
		<?php echo $form->error($model,'addTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upTime'); ?>
		<?php echo $form->textField($model,'upTime'); ?>
		<?php echo $form->error($model,'upTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keyWord'); ?>
		<?php echo $form->textField($model,'keyWord',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keyWord'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site'); ?>
		<?php echo $form->textField($model,'site',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'site'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sourceUrl'); ?>
		<?php echo $form->textField($model,'sourceUrl',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sourceUrl'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
