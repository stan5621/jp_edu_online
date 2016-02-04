
<h3 class="dxd-fancybox-header">小组收藏课程</h3>
<div class="dxd-fancybox-body">
<p>我管理的小组</p>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'summaryText'=>false,
	'viewData'=>array('courseId'=>$courseId),
	'itemView'=>'_view',
	'emptyText'=>'没有我管理的小组',
)); ?>
</div>

<div class="dxd-fancybox-footer">
</div>