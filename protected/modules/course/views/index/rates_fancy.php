
<h3 class="dxd-fancybox-header">课程评价</h3>
<div class="dxd-fancybox-body">
<div>
<?php 
if($myRate){
	$this->renderPartial('_rate_view',array('data'=>$myRate));
	echo CHtml::link('修改评价',array('toggleRate','id'=>$course->id),array('class'=>'pull-right'));
}else{
	echo CHtml::link('我要评价',array('toggleRate','id'=>$course->id));
}
?>
<div class="clearfix"></div>
</div>
<h4>全部评价</h4>
	<?php 
	$this->widget('bootstrap.widgets.TbListView', array(
	    'dataProvider'=>$rateDataProvider,
	    'itemView'=>'_rate_view',   // refers to the partial view named '_post'
		'emptyText'=>'暂时还没有评价',
		'summaryText'=>false,
		'separator'=>'<hr style="margin:10px 0;"/>'
	));
	?>
</div>

<div class="dxd-fancybox-footer">
</div>