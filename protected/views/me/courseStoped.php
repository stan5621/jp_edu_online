<?php
$this->widget('bootstrap.widgets.TbThumbnails', array(
	    'dataProvider'=>$courseDataProvider,
	    'template'=>"{items}\n{pager}",
	    'itemView'=>'_courseStoped',
		'emptyText'=>'没有相关课程'
	));
	?>