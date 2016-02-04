<?php
/* @var $this LessonController */
/* @var $model Lesson */
/*
$this->breadcrumbs=array(
	'Lessons'=>array('index'),
	$model->title=>array('view','id'=>$model->lessonid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lesson', 'url'=>array('index')),
	array('label'=>'Create Lesson', 'url'=>array('create')),
	array('label'=>'View Lesson', 'url'=>array('view', 'id'=>$model->lessonid)),
	array('label'=>'Manage Lesson', 'url'=>array('admin')),
);*/
?>

<h3 class="dxd-fancybox-header">编辑课时</h3>
<div class="dxd-fancybox-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>

<div class="dxd-fancybox-footer">
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'保存',
	'buttonType'=>'submit',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'htmlOptions'=>array('class'=>'pull-right'),
)); ?>
</div>
 
