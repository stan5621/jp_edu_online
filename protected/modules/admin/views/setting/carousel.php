<h3 class="side-lined">网站设置</h3>


<?php
/* @var $this AnswerController */
/* @var $model Answer */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'carousel-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'url1'); ?>
    <?php echo $form->fileFieldRow($model, 'path1'); ?>
    
    <?php echo $form->textFieldRow($model,'url2'); ?>
    <?php echo $form->fileFieldRow($model, 'path2'); ?>
    
    <?php echo $form->textFieldRow($model,'url3'); ?>    
    <?php echo $form->fileFieldRow($model, 'path3'); ?>
    
    <?php echo $form->textFieldRow($model,'url4'); ?>
    <?php echo $form->fileFieldRow($model, 'path4'); ?>

    

	<div class="row buttons">
		<?php echo CHtml::submitButton('保存',array('class'=>'btn btn-primary pull-right')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->