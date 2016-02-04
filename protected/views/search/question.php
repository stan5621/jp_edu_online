<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

?>
<div class="row ">
<?php 

?>
	<div class="span2">
		<?php $this->renderPartial('_side_nav',array('keyword'=>$keyword));?>
	</div>
	<div class="span10">
	<?php $this->renderPartial('_form',array('cate'=>'question','keyword'=>$keyword))?>

	<h5>搜索 "<em><b><?php echo CHtml::link($keyword,"#");?>"</b></em>共得 <b><?php echo $dataProvider->totalItemCount;?></b> 条问题相关结果</h5>
	<br/>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}\n{pager}",
	    'itemView'=>'_question',
		'separator'=>'<div style="margin:20px 0;"><div>',
		'viewData'=>array('keyword'=>$keyword),
		'emptyText'=>false
	)); ?>
	</div>
</div>

