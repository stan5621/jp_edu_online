<?php
/* @var $this NoticeController */
/* @var $data Notice */
$comment = AnswerComment::model()->with('user','answer.question')->findByPk($data['commentId']);
$question = $comment->answer->question;
if(!$comment || !$question) return false;
?>


	<?php echo CHtml::link($comment->user->name,$comment->user->pageUrl);?>评论了你在
	<?php echo CHtml::link($question->title,array('question/view','id'=>$question->id));?>中的回答
