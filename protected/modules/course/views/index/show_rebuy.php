<?php
/* @var $this MessageController */
/* @var $model Message */
?>

<h3 class="dxd-fancybox-header">课程续费</h3>
<div class="dxd-fancybox-body">

	<div style=""><span style=""><span class="text-error">小提示：</span>你已过课程有效期，需要重新续费才能加入学习<br/>
	续费价格：￥</span><span class="text-success"><?php echo $course->renewFee;?>元</span></div>


</div>

<div class="dxd-fancybox-footer">

	<div class="mt20">
		<?php echo CHtml::link('去续费',array('rebuy','id'=>$course->id),array('class'=>'pull-right btn btn-success'));?>
	</div>
	<div class="clearfix"></div>
</div>
