<?php
/* @var $this NoticeController */
/* @var $data Notice */

$comment    =   Comment::model()->findByPk($data['commentId']);
//$post       =   Post::model()->findByAttributes(array('entityId'=>$comment['commentableEntityId']));

echo CHtml::link($comment->user->name,$comment->user->pageUrl);
echo ' 对你的评论 ';
echo CHtml::link(mb_substr($comment->refer->content,0,10,'utf8'), array('//comment/view', 'id'=>$comment->id));
echo ' 做了回复: ';
echo mb_substr($comment->content,0,10);

?>
