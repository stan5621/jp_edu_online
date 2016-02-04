<?php $post =  new CoursePost; 
?>
<div class="dxd-add-comment-form"  >
<?php
	$form=$this->beginWidget("bootstrap.widgets.TbActiveForm",array(
					'id'=>'comment-form',
				//	'action'=>array('lesson/comment','lessonid'=>$lesson->lessonid),
					'enableAjaxValidation'=>false
			));?>
		
	<?php echo $form->textAreaRow($post,'content',array('label'=>false,
															'class'=>'dxd-elastic-form dxd-add-comment-textarea',
														//	'id'=>'dxd-add-comment-form-'.$comment->id,
															'style'=>'width:97%',
															'value'=>"",
															'placeHolder'=>'我的评论'
									));?>
    
	<?php 
	if(isset($lessonId) && $lessonId){
		echo CHtml::ajaxSubmitButton('发布',array('post/createInLesson','lessonId'=>$lessonId),array('success'=>'onCommentSuccess'),array('class'=>'btn btn-primary pull-right','style'=>'display:none;', 'id'=>'dxd-lesson-post-btn'));
	}else{
		echo CHtml::ajaxSubmitButton('发布',array('post/createInCourse','courseId'=>$courseId),array('success'=>'onCommentSuccess'),array('class'=>'btn btn-primary pull-right','style'=>'display:none;', 'id'=>'dxd-lesson-post-btn'));
	}?>
    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>

</div>

    <script type="text/javascript">
    $('.dxd-add-comment-textarea').focus(function() {
        $(this).parents('.dxd-add-comment-form').find('.btn').fadeIn();
    }).blur(function(){
//        $(this).parents('.dxd-add-comment-form').find('.btn').fadeOut();
     });

    function onCommentSuccess(data){
        if(data){
			$('.dxd-add-comment-textarea').attr('value','');
            $(".dxd-lesson-comments").html(data);
        }
    }


    </script>