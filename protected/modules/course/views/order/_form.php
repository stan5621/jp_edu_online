<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'subject',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'produceEntityId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'userId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'meansOfPayment',array('class'=>'span5','maxlength'=>9)); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'addTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'paidTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tradeNo',array('class'=>'span5','maxlength'=>32)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
