<?php
/* @var $medel Group */
/* @var $question Question */
?>

<h3>在 <em><?php echo $model->name?></em> 提问</h3>
<div class="row dxd-group-body">
	<div class="span9 dxd-left-col">
<?php echo $this->renderPartial('/question/_form', array('model'=>$question)); ?>
	</div>
	<div class="span3">
		<?php echo CHtml::link('< &nbsp;返回'.$model->name,array('index/view','id'=>$model->id));?>
	</div>
</div>