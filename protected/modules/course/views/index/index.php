<?php
$this->pageTitle = Yii::app()->name."-课程";
?>
<!-- 创建课程 -->
<div class="row visible-phone">
        <?php if (Yii::app()->user->checkAccess('teacher')) {
            echo CHtml::link('+ 申请创建课程', array('create'), array('class'=>'btn span12'));
        } ?>
</div>
<div class="row" style="margin-top:30px; position:relative">
    <!-- 创建课程 -->
    <div class="add-course hidden-phone">
        <?php if (Yii::app()->user->checkAccess('teacher')) {
            echo CHtml::link('+ 申请创建课程', array('create'), array('class'=>'btn'));
        } ?>
    </div>
<div class="span12">
<div class="pull-left mr15 light-green" style="font-size:1.2em;line-height:32px;">大类</div>
	<div class="course-category-tabs">

<?php
$firstCategoryItems = array();
$firstCategoryItems[] = array('label'=>'全部','url'=>array('index','categoryId'=>0,'order'=>$order),'active'=>($firstCategoryId==0));
foreach($firstCategories as $item){
	$firstCategoryItems[] = array('label'=>$item->name,'url'=>array('index','categoryId'=>$item->id,'order'=>$order),'active'=>($firstCategoryId==$item->id));
}
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>$firstCategoryItems
)); ?>
</div>
</div>
<div class="span12">
<div class="pull-left mr15 light-green"  style="font-size:1.2em;line-height:32px;">小类</div>
	<div class="course-category-tabs">
	<?php
	$secondCategoryItems = array();
	$secondCategoryItems[] = array('label'=>'全部','url'=>array('index','categoryId'=>$firstCategoryId,'order'=>$order),'active'=>($secondCategoryId==0));
	if(!$secondCategories) $secondCategories=array();
	foreach($secondCategories as $item){
		$secondCategoryItems[] = array('label'=>$item->name,'url'=>array('index','categoryId'=>$item->id,'order'=>$order),'active'=>($item->id==$secondCategoryId));
	}
	$this->widget('bootstrap.widgets.TbMenu', array(
	    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
	    'stacked'=>false, // whether this is a stacked menu
	    'items'=>$secondCategoryItems
	)); ?>
	</div>
</div>
</div>
<div class="row">
<div class="span12">
	<div class="course-category-tabs course-category-order">
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
		array('label'=>'人气&nbsp;<i class=" icon-arrow-down"></i>','url'=>array('index','categoryId'=>$category->id,'order'=>"student"),'active'=>($order=='student')),
		array('label'=>'价格&nbsp;<i class=" icon-arrow-up"></i>','url'=>array('index','categoryId'=>$category->id,'order'=>"fee"),'active'=>($order=='fee')),
		array('label'=>'最新&nbsp;<i class=" icon-arrow-down"></i>','url'=>array('index','categoryId'=>$category->id,'order'=>"time"),'active'=>($order=='time')),
	),
	'encodeLabel'=>false,
));
?>
</div>
</div>
</div>
<div class="row">
<div class="span12">
		<?php

		$this->widget('bootstrap.widgets.TbThumbnails', array(
		  //  'dataProvider'=>new CActiveDataProvider('Course',array('criteria'=>array('order'=>'memberNum desc'),'pagination'=>array('pageSize'=>4))),
		    'dataProvider'=>$dataProvider,
			'template'=>"{items}",
		    'itemView'=>'_course_item',
		    'emptyText'=>'暂时还没有该类课程'
		));
	?>
</div>
</div>
