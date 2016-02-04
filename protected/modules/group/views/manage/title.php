<?php 
 $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
 	'homeLink'=>false,
    'links'=>array($model->name=>array('index/view','id'=>$model->id), "小组管理"),
)); 
?>
<div class="row">
	<div class="span2 dxd-course-category">
        <?php $this->renderPartial('_side_nav',array('group'=>$model));?>
	</div>

	<div class="span10 form">
		<h3 class="side-lined">小组称号</h3>
        
        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'enableClientValidation'    =>  true,
            'clientOptions' =>  array(
                'validateOnSubmit'  =>  true,
            ),
        ));?>
        
        <div class="row">
            <?php echo $form->textFieldRow($model, 'leaderTitle'); ?>
        </div>
        <div class="row">
            <?php echo $form->textFieldRow($model, 'memberTitle'); ?>
        </div>
        <div class="row">
            <?php echo $form->textFieldRow($model, 'adminTitle'); ?>
        </div>
        
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'type'          =>  'primary',
            'label'         =>  '保存',
            'buttonType'    =>  'submit',
        )); ?>
        <?php $this->endWidget(); ?>
    </div>
</div>

