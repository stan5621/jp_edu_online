<?php
/* @var $this NoticeController */
/* @var $data Notice */
$vote = Vote::model()->findByPk($data['voteId']);
$comment = null;
if($vote) $comment = Comment::model()->findByAttributes(array('entityId'=>$vote->voteableEntityId));
if(!$comment) return false;
?>
你的评论
<?php echo CHtml::link(mb_substr(strip_tags($comment->content), 0,20),array('comment/view','id'=>$comment->id));?>
<?php //echo CHtml::link($comment->entity->getTitle(),array($comment->entity->type.'/view','id'=>$model->id));?>
新增加一个<em><?php echo ($vote->value>0?"<span style=\"color:green\">赞同</span>":"<span style=\"color:red\">反对</span>")?></em>