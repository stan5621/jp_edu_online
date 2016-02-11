<?php
 $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
 	'homeLink'=>false,
    'links'=>array($course->name=>array('/course/index/view','id'=>$course->id), "课程管理"),
)); 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row ">
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
	<div class="span2 dxd-course-category">
	<?php $this->renderPartial('_side_nav',array('course'=>$course));?>
	</div>
	<div class="span10">
	<h3 class="side-lined">订单列表</h3>
<?php //$model = new Order();
	 // $model->produceEntityId = $course->entityId;?>
  <?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'order-grid',
//	'dataProvider'=>$orderDataProivider,
  	'dataProvider'=>$order->search(),
	'filter'=>$order,
	'columns'=>array(
		'id',
		'statusLabel',
		'subject',
		'user.name',
		'price',
		array(
			'name'=>'addTime',
			'value'=>'date("Y-m-d H:i",$data->addTime)', 
		),
		array(
		    'name'=>'paidTime',
		    'value'=>'$data->paidTime>0?'.'date("Y-m-d H:i",$data->paidTime):\'未付费\'',
		),
		
	),
)); ?>

     </div>

</div>

