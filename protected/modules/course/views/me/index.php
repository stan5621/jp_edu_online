<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

?>

<div class="row ">
<?php 

?>
	<div class="span9 center">
<?php $this->renderPartial('_header')?>
		
		<?php
$link = CHtml::link('<em>点击这里找到课程</em>',array('index/index'));
$this->widget('bootstrap.widgets.TbThumbnails', array(
	    'dataProvider'=>$courseDataProvider,
	    'template'=>"{items}\n{pager}",
	    'itemView'=>'_course_item',
		'emptyText'=>'没有相关课程 '.$link,
	));
	?>
	</div>
</div>


