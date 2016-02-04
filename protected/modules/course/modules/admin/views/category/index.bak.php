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
		

<!-- 添加联系人开始 -->
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

<!-- 添加联系人 -->

<?php 
	if(Category::model()->count(array('condition'=>'type="'.$type.'"'))>0){
	$model->type=$type;
	$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(50),
	'filter'=>$model,
	'columns'=>array(
        array(
           'class' => 'editable.EditableColumn',
           'name' => 'name',
          'filter'=>CHtml::activeTextField($model, 'name', 
                 array('placeholder'=>'搜索')),
           'editable' => array(    //editable section
                  'url'        => $this->createUrl('category/update'),
                  'placement'  => 'right',
              )               
        ),
        array(
           'class' => 'editable.EditableColumn',
           'name' => 'weight',
        	'filter'=>CHtml::activeTextField($model, 'weight', 
                 array('placeholder'=>'搜索')),
           'editable' => array(    //editable section
                  'url'        => $this->createUrl('category/update'),
                  'placement'  => 'right',
              )               
        ),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete}',
	         'htmlOptions'=>array('style'=>''),
		),
	),
)); 
}else{
echo "暂无分类";
}?>
		
</div>
</div>