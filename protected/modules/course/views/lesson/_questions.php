<?php
/* @var $this LessonController */
/* @var $data Lesson */
		
		$this->widget('bootstrap.widgets.TbListView',array(
				'dataProvider'=>$commentDataProvider,
			'itemView'=>'/lesson/_comment_item',
			'separator'=>'<hr/>',
			'viewData'=>array('lesson'=>$lesson),
			'emptyText'=>'还没有评论',
		));
		
?>
