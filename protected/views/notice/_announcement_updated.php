<?php 

$announcement   =   Announcement::model()->findByPk($data);
$course         =   Course::model()->findByPk($announcement['courseId']);
// 如果Announcement 或 Course 为空则跳过打印Notice
if(empty($announcement) || empty($course)) return;

echo '课程 ' . CHtml::link($course['name'], array('/course/index/view', 'id'=>$course['id'])) . ' 更新了公告 ';
echo CHtml::link('&nbsp;&nbsp;&nbsp;[详情]', array('/course/announcement/detail', 'id'=>$announcement['id']), array('onclick'=>'openFancyBox(this);return false;'));
