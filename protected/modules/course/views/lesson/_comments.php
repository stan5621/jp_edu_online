<?php
/* @var $this LessionController */
/* @var $data Lession */
$this->widget('bootstrap.widgets.TbListView',array(
				'dataProvider'=>$commentDataProvider,
			'itemView'=>'/lesson/_comment_item',
			'separator'=>'<hr/>',
			'template'=>'{items}',
			'viewData'=>array('lesson'=>$lesson),
			'emptyText'=>'还没有评论',
		));
?>
    <script type="text/javascript">
    $('.dxd-add-comment-textarea').focus(function() {
        $(this).parents('.dxd-add-comment-form').find('.btn').fadeIn();
    }).blur(function(){
        $(this).parents('.dxd-add-comment-form').find('.btn').fadeOut();
     });
    
    
    function onCommentSuccess(data){
        if(data){
			$('.dxd-add-comment-textarea').attr('value','');
            $(".dxd-lesson-comments").html(data);
            }
    }
    </script>