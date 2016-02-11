<?php
/* @var $this CourseManageController */
/* @var $dataProvider CActiveDataProvider */
 $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
 	'homeLink'=>false,
    'links'=>array($course->name=>array('/course/index/view','id'=>$course->id), "课程管理"),
 )); 
?>

<div class="row ">

	<div class="span2 dxd-course-category">
	<?php $this->renderPartial('_side_nav',array('course'=>$course));?>
	</div>
	<div class="span10">
	<h3 class="side-lined">详细信息</h3>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>isset($ajax)?true:false,
	'enableClientValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true,),
)); ?>

	<?php echo $form->errorSummary($course); ?>

	<div class="row">
		<?php echo $form->labelEx($course,'subTitle'); ?>
		<?php echo $form->textField($course,'subTitle',array('class'=>'input-block-level')); ?>
		<?php echo $form->error($course,'subTitle'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($course,'introduction'); ?>
		<?php echo $form->textArea($course,'introduction',array('rows'=>7, 'class'=>"input-block-level dxd-kind-editor")); ?>
		<?php echo $form->error($course,'introduction'); ?>
		
		
			<div class="row">
		<?php echo $form->labelEx($course,'targetStudent'); ?>
		<?php echo $form->textField($course,'targetStudent',array('class'=>'input-block-level')); ?>
		<?php echo $form->error($course,'targetStudent'); ?>
	</div>
		
	</div>
<br/>
	<div class="row buttons">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
    'type'=>'primary',
    'label'=>$course->isNewRecord ? '发布' : '保存',
    'buttonType'=>'submit',
	'htmlOptions'=>array('class'=>'pull-right')
    )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


		
	</div>
</div>





