<?php
/* @var $this NoticeController */
/* @var $data Notice */
$answer = Answer::model()->with('user','question')->findByPk($data['answerid']);
if(!$answer)return false;
?>


	<?php echo CHtml::link($answer->user->name,array("/u/index",'id'=>$answer->userId));?>回答了测试问题
	<?php echo CHtml::link($answer->question->title,array('question/view','id'=>$answer->question->id));?>并申请加入
	<?php echo CHtml::link($answer->question->group->name,array('group/view','id'=>$answer->question->groupid));?>小组	
