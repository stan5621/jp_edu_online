<?php
/* @var $this CourseRateController */
/* @var $model CourseRate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'course-rate-form',
	'enableAjaxValidation'=>false,
	'action'=>$action,
)); ?>
		<div class="">
		
		<?php echo $form->labelEx($model,'score');?>
		        <?php      
		                $this->widget('CStarRating',array(
		                          'model'=>$model,
		                          'attribute'=>'score',
		                          'minRating'=>2,
		                          'maxRating'=>10,
		                		  'ratingStepSize'=>2,
		                          'starCount'=>5,
		                		  'allowEmpty'=>false,
		                		 'titles'=>array(2=>'很差',4=>'较差',6=>'还行',8=>'推荐',10=>'力荐'),
		                          'readOnly'=>false,
		                        ));
		                 ?>
		
		</div>
<br/>
		<div class="">
			<?php echo $form->textAreaRow($model, 'content', array('class'=>'dxd-elastic-form','style'=>'width:96%','rows'=>3, 'placeHolder'=>"写下评价内容")); ?>
		</div>

	<div class="buttons">
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>$model->isNewRecord ? '创建' : '保存',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'buttonType'=>'submit',
	'htmlOptions'=>array('class'=>'pull-right'),
)); ?>
	</div>

<?php $this->endWidget(); ?>
<div class="clearfix"></div>
</div><!-- form -->