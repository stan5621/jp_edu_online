<!--  
<h3 class="dxd-fancybox-header">上传个人头像</h3>
<div class="dxd-fancybox-body">
<ul>
<li>支持图片格式为*.png,*.gif,*.jpg,*.jpeg，大小不能超过2MB；</li>
<li>建议图片的长高比约为1：1；</li>
</ul>
<p></p>
<?php 
/*
$model = new XUploadForm;
$this->widget('xupload.XUpload', array(
                    'url' => $this->createUrl('me/setFace',array('id'=>$user->id)),
                    'model' => $model,
                    'attribute' => 'file',
					'multiple'=>false, 
					'autoUpload'=>true,
		            'options' => array(
		                'maxFileSize' => 3*1024*1024,
		                'acceptFileTypes' => "js:/(\.|\/)(jpe?g|png|gif)$/i",
		            ),
));*/
?>
</div>

<div class="dxd-fancybox-footer">
</div>
-->


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
		        array('label'=>'基本信息', 'url'=>array("//me/setBasic")),
		        array('label'=>'个人头像', 'url'=>array("//me/uploadFace")),
		        ),
		    "htmlOptions"=>array('class'=>"")
		)); ?>
		<div class="span6 center">
		<p>当前头像</p>
		<?php echo CHtml::image(Yii::app()->baseUrl."/".$model->face);?>
		<br/><br/>

		<div class="form">
		
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'set-basic-form',
		//	'enableAjaxValidation'=>TRUE,
			'clientOptions'=>array(
				'validateOnSubmit'=>false,
			),
			'htmlOptions' => array(
        		'enctype' => 'multipart/form-data'
    		)
		)); ?>
		
			<?php echo $form->errorSummary($model); ?>
			<div class="row">
				<p>更换头像</p>
				<?php echo $form->fileField($model,'face',array('class'=>'btn')); ?>
				<?php echo $form->error($model,'face'); ?>
			</div>		
			<div class="row buttons" style="margin-top:15px">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
    'type'=>'success',
    'label'=>'保存',
    'buttonType'=>'submit',
	'htmlOptions'=>array('class'=>'pull-right')
    )); ?>
    			</div>
		
		<?php $this->endWidget(); ?>
		
		</div><!-- form -->
		</div>
	</div>
</div>


