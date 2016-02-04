<div class="form">
    <?php $form=$this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id'=>'course-category-form',
            'enableAjaxValidation'=>false,
        )
    ); ?>

    <?php echo $form->errorSummary($model); ?>

        <div class="">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'name'); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '更新', array('class'=>'btn btn-default')); ?>
        </div>

    <?php $this->endWidget(); ?>
</div>
