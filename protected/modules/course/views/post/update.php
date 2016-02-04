<?php
/* @var $this PostController */
/* @var $model Post */
?>

<h3>编辑帖子</h3>
<div class="row dxd-course-body">
	<div class="span9 dxd-left-col">
	<?php echo $this->renderPartial('_form', array('model'=>$model,'course'=>$model->course)); ?>
	</div>
	<div class="span3">
			<?php echo CHtml::link('< &nbsp;返回'.$course->name,array('/course/post/index','courseId'=>$course->id));?>
	</div>
</div>

