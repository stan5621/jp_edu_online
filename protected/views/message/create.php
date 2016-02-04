<?php
/* @var $this MessageController */
/* @var $model Message */
?>


<h3 class="dxd-fancybox-header">写私信</h3>
<div class="dxd-fancybox-body">
<div style=""><span style="font-size:0.9em;font-weight:bold;">收信人:&nbsp;&nbsp;</span><span style="font-size:1em;"><?php echo $toUser->name;?></span></div>

<div class="form dxd-message-form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('style'=>'margin:0;','class'=>'message-form')
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'toUserId',array('value'=>$toUser->id)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
	<!--  
	<?php echo CHtml::ajaxSubmitButton('发送',array('message/create'),array('success'=>
		'js:function(data){if(data){$(".dxd-message-form").html("<p>发送成功!</p>");setTimeout(function(){$.fancybox.close();},1500);}else{$(".dxd-message-form").append($("<p>发送失败</p>"));}}'),
	array('class'=>'btn btn-primary pull-right','id'=>'message-form-submit-btn-'.$toUser->id))?>
	-->
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'发送')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>

<div class="dxd-fancybox-footer">
</div>

<script type="text/javascript">
$(document).ready(function(){
	var url = '<?php echo $this->createUrl('message/create');?>';
	$('.message-form').unbind('submint').submit(function(){
		var formData = $(this).serialize();
		$.post(url,formData,function(data){
			if(data){
				$(".dxd-message-form").html("<p>发送成功!</p>");
				setTimeout(function(){$.fancybox.close();},1500);
			}else{
				$(".dxd-message-form").append($("<p>发送失败</p>"));
			}
		});
		return false;
	});
});
</script>

