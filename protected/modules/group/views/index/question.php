<?php
/* @var $this PostController */
/* @var $model Post */
 
/* $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array($post->group->name=>array('index/view','id'=>$post->group->id), 
 				//	'讨论区'=>array('post/index','groupid'=>$post->groupid),
 					$post->title),
 	'homeLink'=>false)); 
*/
$this->pageTitle = $question->title;
 Yii::app()->clientScript->registerMetaTag(mb_substr(strip_tags($question->description),0,200,'utf8')."...", 'description');
 ?>
<div class="row dxd-group-body">
	<div class="span9 dxd-left-col">
		<?php $this->renderPartial('/question/view',array('question'=>$question))?>
	</div>
	<div class="span3 dxd-right-col" style="padding-top:20px">
	<?php echo CHtml::link('<  返回'.$model->name,array('index/view','id'=>$model->id));?>
	
		<div>
		<br/>

	</div>
	</div>
</div>

<style type="text/css">
.dxd-right-col{
padding-top:40px;
}
</style>

