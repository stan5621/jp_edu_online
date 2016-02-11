<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
 //   'type'=>'horizontal',
 	'action'=>$model->isNewRecord ? array('create','courseId'=>$model->courseId) : array('update','id'=>$model->id),
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
)); ?>

	<?php echo $form->errorSummary($model); ?>
 	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5'));?>
 <?php echo $form->radioButtonListInlineRow($model, 'isFree', array(
		'1'=>'是', 
		'0'=>'否'
    )); ?>
 	<?php echo $form->textAreaRow($model,'introduction',array('class'=>'input-block-level','style'=>'min-height:90px;'));?>
 	<?php 
	 if($model->isNewRecord):
		 if(!$model->mediaType) $model->mediaType="video";
		 echo $form->radioButtonListInlineRow($model, 'mediaType', array(
			'video'=>'视频', 
	    )); 
    endif;?>
    
 	<?php echo $form->hiddenField($model, 'courseId');?>
<div class="clearfix"></div>
	<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存',array('class'=>'pull-right btn btn-primary ml10')); ?>
<?php $this->endWidget();?>
<style>
.dxd-hidden{
display:none;
}
</style>
