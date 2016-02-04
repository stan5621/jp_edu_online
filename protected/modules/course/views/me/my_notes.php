<div class="row">

	<div class="span9 center">
	<?php $this->renderPartial('_header')?>
<?php 
echo CHtml::link('<i class="icon-chevron-left"></i>返回',array('noteList'),array('class'=>'btn'));
?>
&nbsp;   &nbsp;
<em>
所属课程:
<?php echo CHtml::link($course->name,$course->pageUrl);?>
</em>
<div style="margin-top:30px">
<?php $this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_note_item',
	'summaryText'=>'共 {count} 条笔记',
	 'template'=>"{summary}\n{items}\n{pager}",
	'separator'=>'<hr/>'
)); ?>
	
	</div>
	</div>
</div>