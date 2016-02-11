<?php
/* @var $this GroupController */
/* @var $model Post */
?>

<h3>在 <em><?php echo $group->name?></em> 发布新帖</h3>
<div class="row dxd-group-body">
	<div class="span9 dxd-left-col">
<?php echo $this->renderPartial('_form', array('model'=>$post,'group'=>$group)); ?>
	</div>
	<div class="span3">
		<?php echo CHtml::link('< &nbsp;返回'.$group->name,array('index/view','id'=>$group->id));?>
	</div>
</div>