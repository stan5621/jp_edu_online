	<?php isset($comment) or $comment= new Comment; 
	$form=$this->beginWidget("bootstrap.widgets.TbActiveForm",array(
					'id'=>'comment-form',
					//'action'=>array('lesson/addComment','id'=>$lesson->id),
					'enableAjaxValidation'=>false
			));?>
		
	<?php echo $form->textAreaRow($comment,'content',array('label'=>false,
															'class'=>'dxd-elastic-form',
															'style'=>'width:96%',
															'value'=>"",
															'placeHolder'=>'我的评论'
									));?> 
	<?php echo CHtml::hiddenField("Comment[referId]",$comment->id ? $comment->id : 0);?>
   
	<?php 
	echo CHtml::ajaxSubmitButton('提问',array('lesson/addComment','id'=>$lesson->id),
									   array('success'=>'js:function(data){if(data){$(".dxd-lesson-comments").html(data);}}'),
									   array('class'=>'btn btn-primary'));?>
		
    <?php $this->endWidget(); ?>