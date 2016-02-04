<div class="row">

	<div class="span9 center">
<?php $this->renderPartial('_header')?>

<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_course_note_item',
	'summaryText'=>'共 {count} 个笔记本',
	 'template'=>"{summary}\n<br/>{items}\n{pager}",
)); ?>
	
	</div>
</div>