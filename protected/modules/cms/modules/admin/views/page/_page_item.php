<?php
/* @var $this CourseRateController */
/* @var $model CourseRate */
/* @var $form CActiveForm */
?>

<li>
<?php 
echo $data->title;

echo '&nbsp;&nbsp;&nbsp;';
echo '导航栏链接地址: /index.php?r=page/view&id='.$data->id;
?>
<div class="pull-right">
<?php 
echo CHtml::link('<i class="icon-pencil"></i>编辑',array('page/update','id'=>$data->id),
														array('class'=>'ml10',
															));

echo CHtml::link($data->published>0?'<i class="icon-eye-close"></i><span class="text-warning">取消发布</span>':'<i class="icon-eye-open"></i>发布',
				array('page/togglePublished','id'=>$data->id),
				array('class'=>'ml10'));
?>
</div>
</li>
