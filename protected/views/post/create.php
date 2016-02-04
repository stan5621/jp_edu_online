<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Create',
);

?>

<h3>在 <em><?php echo $group->name?></em> 发布新帖</h3>
<div class="row dxd-group-body">
	<div class="span9 dxd-left-col">
<?php echo $this->renderPartial('_form', array('model'=>$post)); ?>
	</div>
	<div class="span3">
		<?php echo CHtml::link('< &nbsp;返回'.$group->name,array('group/view','id'=>$group->id));?>
	</div>
</div>