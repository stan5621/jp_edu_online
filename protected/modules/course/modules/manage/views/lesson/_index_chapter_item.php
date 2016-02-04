<?php
/* @var $this CourseRateController */
/* @var $model CourseRate */
/* @var $form CActiveForm */
?>
<div class="dxd-hover-show-container dxd-sortable-chapter-inner">
<span class="muted">第<?php echo $data->number;?>章：</span>
<?php 
echo $data->title;
?>		
	<div class="pull-right dxd-hover-show">
	<?php 
	echo CHtml::link('<i class="icon-pencil"></i>编辑',array('chapter/update','id'=>$data->id),
															array('onclick'=>'openFancyBox(this);return false;',
																  'data-fancyWidth'=>700,
																  'data-fancyHeight'=>350,
																  'class'=>'ml10'));
													
	echo CHtml::link('<i class="icon-trash"></i>删除',array('chapter/delete','id'=>$data->id),
															array('class'=>'ml10',
																  ));
	?>
</div>
<div class="clearfix"></div>
</div>
