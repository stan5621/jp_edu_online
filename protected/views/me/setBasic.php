<?php
/* @var $this UserController */
/* @var $model UserInfo */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="span2 ">
		<?php $this->renderPartial("_side_nav");?>
	</div>
	<div class="span10">
		<h3 class="side-lined">账号设置</h3>
		<?php $this->widget('bootstrap.widgets.TbMenu', array(
		    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		    'items'=>array(
		        array('label'=>'基本信息', 'url'=>array("me/setBasic")),
		        array('label'=>'个人头像', 'url'=>array("me/uploadFace")),
		        ),
		    "htmlOptions"=>array('class'=>"")
		)); ?>
		<div class="span4 center">

		<div class="form">
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'set-basic-form',
		//	'enableAjaxValidation'=>TRUE,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			)
		)); ?>
		
			<?php echo $form->errorSummary($model); ?>
		
			<div class="row">
				<?php echo $form->labelEx($model,'name'); ?>
				<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>20,'class'=>'input-block-level','placeHolder'=>'强烈推荐使用真实姓名')); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>
		
		
			<div class="row">
				<?php echo $form->labelEx($model,'bio'); ?>
				<?php echo $form->textField($model,'bio',array('size'=>60,'maxlength'=>200,'class'=>'input-block-level')); ?>
				<?php echo $form->error($model,'bio'); ?>
			</div>
	
			<div class="row">
				<?php echo $form->labelEx($model,'introduction'); ?>
				<?php echo $form->textArea($model,'introduction',array('class'=>'input-block-level','rows'=>6)); ?>
				<?php echo $form->error($model,'introduction'); ?>
			</div>		
			<div class="row buttons" style="margin-top:15px">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
    'type'=>'success',
    'label'=>'保存',
    'buttonType'=>'submit',
	'htmlOptions'=>array('class'=>'btn-block')
    )); ?>
    			</div>
		
		<?php $this->endWidget(); ?>
		
		</div><!-- form -->
		</div>
	</div>
</div>

