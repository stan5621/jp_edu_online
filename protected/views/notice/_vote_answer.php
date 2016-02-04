<?php
/* @var $this NoticeController */
/* @var $data Notice */
$vote = AnswerVote::model()->with('answer.question')->findByPk($data['voteid']);
if(!$vote) return false;
?>
<?php 
if($vote)
{	
	$question = $vote->answer->question;
?>
你对
<?php echo CHtml::link($question->title,array('question/view','id'=>$question->id));?>
的回答新增加一个<em><?php echo ($vote->value>0?"<span style=\"color:green\">赞同票</span>":"<span style=\"color:red\">反对票</span>")?></em>
<?php }?>