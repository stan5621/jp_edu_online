<div>
	<?php
	$img = CHtml::image(Yii::app()->baseUrl."/".DxdUtil::xImage($data->face, 40, 40),$data->name,array('style'=>'width:40px;height:40px;'));
	echo CHtml::link($img."&nbsp;&nbsp;&nbsp;&nbsp;$data->name",array('//u/index','id'=>$data->userId),array('class'=>'dxd-name','data-userId'=>$data->userId),array('style'=>'width:40px;height:50px;'));
//    echo CHtml::link(,array('u/index','id'=>$data->userId),array('class'=>'dxd-name','data-userId'=>$data->userId,'style'=>'margin-top:5px;'));
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$data->introduction;
	echo CHtml::ajaxLink('通过申请',array('groupMember/setMember','groupid'=>$group->id,'userId'=>$data->userId),array('success'=>'js:function(data){window.location.reload();}'),array('class'=>'btn btn-success pull-right'));
	?>
	<div class="clearfix"></div>
</div>
