<?php ?>
	<div class="my-course-tabs" style="margin-top:20px;margin-bottom:20px;">
		<?php 
		$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
		array('label'=>'在学','url'=>array('learning'),'active'=>(Yii::app()->controller->action->id=="learning")),
		array('label'=>'管理','url'=>array('manage'),'active'=>(Yii::app()->controller->action->id=="manage")),
		array('label'=>'收藏','url'=>array('collect'),'active'=>(Yii::app()->controller->action->id=="collect")),
		array('label'=>'笔记','url'=>array('noteList'),'active'=>(Yii::app()->controller->action->id=="noteList" or Yii::app()->controller->action->id=="note")),
		)));
		?>
		</div>