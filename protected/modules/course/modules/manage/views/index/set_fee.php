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
	<h3 class="side-lined">价格设置</h3>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>isset($ajax)?true:false,
	'enableClientValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true,),
)); ?>

	<?php echo $form->errorSummary($course); ?>

	<div class="row">
		<?php echo $form->labelEx($course,'fee'); ?>
		<?php echo $form->textField($course,'fee',array('class'=>'')); ?>
		<?php echo $form->error($course,'fee'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($course,'validDay'); ?>
		<?php echo $form->textField($course,'validDay',array('class'=>'')); ?>&nbsp;天
		<?php echo $form->error($course,'validDay'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($course,'renewFee'); ?>
		<?php echo $form->textField($course,'renewFee',array('class'=>'')); ?>&nbsp;元
		<?php echo $form->error($course,'renewFee'); ?>
	</div>
		
	</div>
<br/>
	<div class="row buttons">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
    'type'=>'primary',
    'label'=>'设置',
    'buttonType'=>'submit',
	'htmlOptions'=>array('class'=>'pull-right')
    )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


		
	</div>
</div>





