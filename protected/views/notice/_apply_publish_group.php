<?php
/* @var $this NoticeController */
/* @var $data Notice */
$group = Group::model()->with('leader')->findByPk($data['groupid']);
if(!$group) return false;
?>


	<?php echo $group->leader->username;?>申请创建小组<?php echo CHtml::link($group->name,array("/group/view",'id'=>$group->id));?>
