<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'lesson-doc-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->labelEx($model,'fileId');?>
	<?php echo $form->fileField($model,'fileId',array('class'=>'btn')); ?>
	&nbsp;&nbsp;<?php if($model->file) echo $model->file->name;?>
	<p>支持常见文档、视频、音频，压缩文件格式，大小不超过10M</p>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span6')); ?>

	<div class="pull-right">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '上传' : '保存',
		)); ?>
	</div>
	<div class="clearfix"></div>

<?php $this->endWidget(); ?>
