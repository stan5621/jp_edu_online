<?php
$link = CHtml::link('<em>点击这里找到课程</em>',array('course/index'));
$this->widget('bootstrap.widgets.TbThumbnails', array(
	    'dataProvider'=>$courseDataProvider,
	    'template'=>"{items}\n{pager}",
	    'itemView'=>'_courseLearning',
		'emptyText'=>'还没有开始学习课程 '.$link,
	));
	?>