
	<?php isset($comment) or $comment= new Comment; 
?>
<div class="dxd-add-comment-form" <?php if($comment->id){ echo "data-referid=$comment->id  id='dxd-course-add-comment'";}?>>
<?php
	$form=$this->beginWidget("bootstrap.widgets.TbActiveForm",array(
				//	'id'=>'comment-form',
				//	'action'=>array('lesson/comment','lessonid'=>$lesson->lessonid),
					'enableAjaxValidation'=>false
			));?>
		
	<?php echo $form->textAreaRow($comment,'content',array('label'=>false,
															'class'=>'dxd-elastic-form dxd-add-comment-textarea',
														//	'id'=>'dxd-add-comment-form-'.$comment->id,
															'style'=>'width:96%',
															'value'=>"",
															'placeHolder'=>'我的留言'
									));?>
	<?php echo CHtml::hiddenField("Comment[referId]",$comment->id ? $comment->id : 0);?>
    
	<?php /* $this->widget('bootstrap.widgets.TbButton', array(
							'buttonType'=>'submit', 
							'type'=>'primary',
							 'label'=>'评论',
								'htmlOptions'=>array('class'=>'')));*/
	echo CHtml::ajaxSubmitButton('发表',array('addComment','commentableEntityId'=>$commentableEntityId),
			array('success'=>'onCommentSuccess'),
			array('class'=>'btn btn-primary pull-right',
					'style'=>$comment->id?'':"display:none;",
					'id'=>'dxd-add-comment-btn'.$commentableEntityId))?>
		
    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>

</div>