<?php
/* @var $this NoticeController */
/* @var $data Notice */
$vote = LessonNote::model()->with('user','lesson')->findByPk($data['voteid']);
if(!$vote) return false;
?>


	<?php echo CHtml::link($vote->user->name,array("/u/index",'id'=>$vote->userId));?>觉得你在
	<?php echo CHtml::link($vote->lesson->title,array('lesson/view','id'=>$vote->lesson->lessonid));?> 写的个人笔记对他/她有用
