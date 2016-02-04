<?php
/* @var $this NoticeController */
/* @var $data Notice */
?>
	<?php echo CHtml::link($comment->user->name,$comment->user->pageUrl);?>回复了
你关注的帖子
	<?php echo CHtml::link($post->title,array('/post/view','id'=>$post->id));?>