<?php echo CHtml::link($data['comment']->user->name,$data['comment']->user->pageUrl);?> 回复了你对
	<?php echo CHtml::link($data['lesson']->title,array('course/lesson/view','id'=>$data['lesson']->id));?>
	的评论