<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'friend-link-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'logo',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="text-right">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>
<div class="clearfix"></div>
<?php $this->endWidget(); ?>
