<?php
/* @var $this UserController */
/* @var $model UserInfo */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'register-form',
        'enableAjaxValidation'=>TRUE,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        )
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>64,'class'=>'input-block-level')); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>20,'class'=>'input-block-level','placeHolder'=>'')); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>20,'class'=>'input-block-level')); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password2'); ?>
        <?php echo $form->passwordField($model,'password2',array('size'=>60,'maxlength'=>20,'class'=>'input-block-level')); ?>
        <?php echo $form->error($model,'password2'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'bio'); ?>
        <?php echo $form->textField($model,'bio',array('size'=>60,'maxlength'=>200,'class'=>'input-block-level')); ?>
        <?php echo $form->error($model,'bio'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('确定',array('class'=>'btn btn-button btn-success btn-block')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
