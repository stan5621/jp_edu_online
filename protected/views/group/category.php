<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

?>
<div class="row ">
<?php 

?>
	<div class="span2 dxd-course-category">
		<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>Yii::app()->courseCategory->items,
)); ?>
	</div>
	<div class="span10">
	<h3 class="side-lined"><?php echo $category->name;?></h3>
	<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}\n{pager}",
	    'itemView'=>'_card',
		'enableSorting'=>true,
		'sortableAttributes'=>array('addTime'),
		'afterAjaxUpdate'=>'js:function(id,data) {             
            $("span[id^=\'rating\'] > input").rating({"readOnly":true});
        }'
	)); ?>
	</div>
</div>

