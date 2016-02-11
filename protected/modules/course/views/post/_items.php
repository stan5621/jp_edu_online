<?php
/* @var $this LessionController */
/* @var $data Lession */
$this->widget('bootstrap.widgets.TbListView',array(
				'dataProvider'=>$dataProvider,
			'itemView'=>'/post/_item',
			'viewData'=>array('lessonId'=>isset($lessonId)?$lessonId:0,
							'courseId'=>isset($courseId)?$courseId:0,
							'showSource'=>isset($showSource)?$showSource:false),
			'separator'=>'<hr/>',
			'template'=>'{items}{pager}',
			'emptyText'=>'还没有评论',
		));
?>
