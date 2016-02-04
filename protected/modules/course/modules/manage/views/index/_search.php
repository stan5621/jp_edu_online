<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'userId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'memberNum',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'viewNum',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fee',array('class'=>'span5','maxlength'=>7)); ?>

	<?php echo $form->textFieldRow($model,'entityId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'categoryId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'face',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'introduction',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'addTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'rateScore',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'rateNum',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'targetStudent',array('class'=>'span5','maxlength'=>1024)); ?>

	<?php echo $form->textFieldRow($model,'subTitle',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'isTop',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
