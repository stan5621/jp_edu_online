<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'casus-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo $form->textFieldRow($model,'title',array('class'=>'span4')); ?>
	</div>

    <div class="row">
        <?php echo $form->dropDownListRow($model, 'categoryId', CHtml::listData($model->getAllCategories(), 'id', 'name')); ?>
    </div>

	<div class="row">
        <?php $this->widget('ext.kindeditor.KindEditor', array(
            'model'     =>  $model,
            'attribute' =>  'content',
        )); ?>
		<?php echo $form->textAreaRow($model,'content',array('rows'=>16, 'cols'=>50, 'class'=>'span4 dxd-kind-editor')); ?>
	</div>

    <div class="row">
        <?php echo $form->textFieldRow($model, 'keyWord', array('class'=>'span6', 'placeholder'=>'使用半角英文逗号分隔')); ?>
    </div>
	
	<div class="row buttons" style="margin-left:13em">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '保存', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
