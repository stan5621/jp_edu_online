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
	<h3 class="side-lined">基本信息</h3>
		<h4>小组名称与分类</h4>
		<?php $this->renderPartial('/index/_form',array('model'=>$group));?>
		<!--  
		<h4>小组封面图片</h4>
		<?php //$imgUrl = ($group->face && DxdUtil::xImage($group->face,200,100)) ? Yii::app()->baseUrl."/".DxdUtil::xImage($group->face,200,100) : "http://placehold.it/220x110"?>
		<?php //$img = CHtml::image($imgUrl,'image',array('class'=>'pull-left dxd-group-face'));?>
		<?php //echo CHtml::link($img,array('groupManage/setFace','id'=>$group->id),array('class'=>'dxd-set-group-face dxd-fancy-elem','rel'=>'tooltip','data-title'=>'点击设置小组封面图片'));?>
		-->
	</div>
</div>


