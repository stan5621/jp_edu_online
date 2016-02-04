<?php
/* @var $this ContactController */
/* @var $dataProvider CActiveDataProvider */

?>
<div class="container">
<div class="row">
	<div class="span2" >
		<?php $this->renderPartial("/index/_side_nav");?>
	</div>
	<div class="span10">
		<h3 class="side-lined">课程分类</h3>
		

<!-- 添加分类开始 -->
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
	'action'=>array('create'),
    'htmlOptions'=>array('class'=>''),
)); ?>
 
<?php echo $form->textFieldRow($model, 'name', array('class'=>'mr10')); ?>
<?php //echo $form->textFieldRow($model, 'weight', array('class'=>'mr10','value'=>"",'placeholder'=>'可填')); ?>

<?php  echo $form->hiddenField($model, 'type', array('value'=>$type)); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'添加分类')); ?>
 
<?php $this->endWidget(); ?>
<?php //echo CHtml::link('<i class="icon-plus icon-white"></i>添加分类','#')?>
<div class="clearfix"></div>
<div>
<span class="text-error">提示：</span>上下拖动分类可以改变显示顺序，左右拖动分类可以改变分类层级
</div>
<br/>
<!-- 添加联系人 -->
<?php $this->widget('ext.sortabletree.SortableTree',
					array('model'=>new Category(),
							'maxDepth'=>2,
							'itemViewFile'=>"nestable_item",
							'criteria'=>array('condition'=>'type="course"', 'order'=>'weight ASC')));?>
</div>
</div>
