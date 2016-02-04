<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

?>
<div class="row ">
<?php 

?>
	<div class="span2 dxd-course-category">
		<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>CourseCategory::getItems(),
)); ?>
	</div>
	<div class="span10">
	<h3 class="side-lined"><?php echo '关注话题';?></h3>
	<br/>
	<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}\n{pager}",
	    'itemView'=>'_card'
	)); ?>
	</div>
</div>