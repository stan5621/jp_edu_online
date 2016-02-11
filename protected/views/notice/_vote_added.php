<?php
/* @var $this NoticeController */
/* @var $data Notice */
$vote = Vote::model()->findByPk($data['voteid']);
$entity = @Entity::model()->findByPk($vote->voteableEntityId);
$model=@$entity->getModel();
if(!$vote || !$model)  return false;

?>
你的
<?php echo $entity->getTypeLabel();?>
<?php echo CHtml::link($entity->getTitle(),array($entity->type.'/view','id'=>$model->id));?>
新增加一个<em><?php echo ($vote->value>0?"<span style=\"color:green\">赞同</span>":"<span style=\"color:red\">反对</span>")?></em>