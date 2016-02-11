<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'courseId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'lessonId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'upTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'addTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'userId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'commentNum',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'viewNum',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'voteNum',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isTop',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isDigest',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'voteUpNum',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'voteDownNum',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'commentableEntityId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'entityId',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
