<?php
?>
<div class="row">
<div class="span8 center dxd-db-info">
	<div class="well">
	<?php 
$this->renderPartial('_header');
?>		<br/>
		<div class="text-center">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'course-rate-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,),
    'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

<?php 
 echo $form->textFieldRow($model, 'host',array('class'=>'span4','value'=>'localhost'));
  echo $form->textFieldRow($model, 'dbName',array('class'=>'span4'));
  echo $form->textFieldRow($model, 'dbUser',array('class'=>'span4','value'=>'root'));
   echo $form->textFieldRow($model, 'dbPassword',array('class'=>'span4'));
   echo $form->checkboxRow($model, 'create'); 
?>
			<?php 
/*	
	$this->widget('bootstrap.widgets.TbButton', array(
    'type'=>'primary',
    'label'=>"下一步",
    'buttonType'=>'submit',
    )); */
    
		?>
		<div class="text-center">
		<?php echo CHtml::submitButton('下一步',array('class'=>'btn btn-primary ')); ?>
		</div>

<?php $this->endWidget();?>

</div>
</div>
</div>
</div>
<style>
.dxd-db-info .checkbox input{
	float:none;
}
</style>