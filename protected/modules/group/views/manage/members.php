<?php
/* @var $this GroupManageController */
/* @var $dataProvider CActiveDataProvider */
 $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
 	'homeLink'=>false,
    'links'=>array($group->name=>array('index/view','id'=>$group->id), "小组管理"),
)); 
?>

<div class="row ">

	<div class="span2 dxd-course-category">
	<?php $this->renderPartial('_side_nav',array('group'=>$group));?>
	</div>
	<div class="span10">
		<h3 class="side-lined">成员管理</h3>
<h4>超级管理员</h4>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
			    'dataProvider'=>$superAdminDataProvider,
			    'template'=>"{items}\n{pager}",
				'separator'=>'<hr style="margin:10px 0;"/>',
				'viewData'=>array('group'=>$group),
				'itemView'=>'_member_item',   // refers to the partial view named '_post'
		)); ?>	
		<br/>
<h4>管理员</h4>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
			    'dataProvider'=>$adminDataProvider,
			    'template'=>"{items}\n{pager}",
				'separator'=>'<hr style="margin:10px 0;"/>',
				'emptyText'=>'暂时还没有',
				'viewData'=>array('group'=>$group),
				'itemView'=>'_member_item',   // refers to the partial view named '_post'
		)); ?>
				<br/>
		
	
<h4>普通成员</h4>
	<?php 
	//var_dump($memberDataProvider->getData());
	 $this->widget('bootstrap.widgets.TbListView', array(
			    'dataProvider'=>$memberDataProvider,
			    'template'=>"{items}\n{pager}",
				'emptyText'=>'暂时还没有',
				'separator'=>'<hr style="margin:10px 0;"/>',
				'viewData'=>array('group'=>$group),
				'itemView'=>'_member_item',   // refers to the partial view named '_post'
		)); ?>

	</div>	
</div>

