<?php 
$group = Group::model()->findByPk($data['groupId']);
if(!$group) return false;
?>
你申请成立的小组
<?php echo CHtml::link($group->name,array("/group/index/view",'id'=>$group->id));?> 已被批准
