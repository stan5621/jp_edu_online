<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array()); ?>
    <div>
        <?php //echo $form->textAreaRow($model, 'content', array('placeholder'=>'请输入公告内容', 'class'=>'input-block-level', 'rows'=>'4')); ?>
        <?php echo CHtml::activeTextArea($model, 'content', array('placeholder'=>'请输入公告内容', 'class'=>'input-block-level', 'rows'=>'4')); ?>
    </div>
    <?php echo $form->errorSummary($model); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? '发布公告' : '更新公告', array('class'=>'btn btn-primary pull-right', 'style'=>'margin-top:8px')); ?>
<?php $this->endWidget(); ?>
