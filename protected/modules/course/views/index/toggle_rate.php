
<h3 class="dxd-fancybox-header">课程评价</h3>
<div class="dxd-fancybox-body">
<div>
<?php echo CHtml::link('查看全部评价',array('course/rates','id'=>$course->id));?>
<h4>我的评价</h4>
<?php 
$this->renderPartial('_rate_form',array('model'=>($myRate ? $myRate : new Rate),
										'action'=>array('toggleRate','id'=>$course->id)));
?>
</div>

</div>

<div class="dxd-fancybox-footer">
</div>