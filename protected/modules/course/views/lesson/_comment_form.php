
	<?php isset($comment) or $comment= new Comment; 
?>
<div class="dxd-add-comment-form" data-referid=<?php echo ($comment->id?$comment->id:0);?>>
<?php
	$form=$this->beginWidget("bootstrap.widgets.TbActiveForm",array(
					'id'=>'comment-form',
				//	'action'=>array('lesson/comment','lessonid'=>$lesson->lessonid),
					'enableAjaxValidation'=>false
			));?>
		
	<?php echo $form->textAreaRow($comment,'content',array('label'=>false,
															'class'=>'dxd-elastic-form dxd-add-comment-textarea',
														//	'id'=>'dxd-add-comment-form-'.$comment->id,
															'style'=>'width:96%',
															'value'=>"",
															'placeHolder'=>'我的评论'
									));?>
	<?php echo CHtml::hiddenField("Comment[referId]",$comment->id ? $comment->id : 0);?>
    
	<?php /* $this->widget('bootstrap.widgets.TbButton', array(
							'buttonType'=>'submit', 
							'type'=>'primary',
							 'label'=>'评论',
								'htmlOptions'=>array('class'=>'')));*/
	echo CHtml::ajaxSubmitButton('发表',array('lesson/addComment','id'=>$lesson->id),array('success'=>'onCommentSuccess'),array('class'=>'btn btn-primary pull-right','style'=>($comment->id?"":'display:none;'),'id'=>'dxd-lesson-comment-btn'))?>
		
    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>

</div>