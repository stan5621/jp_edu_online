<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'            =>  'login-form',
        'enableClientValidation'    =>  true,
        'clientOptions' =>  array(
            'validateOnSubmit'  =>  true,
        ),
        'htmlOptions'   =>  array("class"=>"well"),
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('class'=>'input-block-level')); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password',array('class'=>'input-block-level')); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row rememberMe" >
        <?php echo $form->checkBox($model,'rememberMe',array('checked'=>"checked")); ?>
        <?php echo $form->label($model,'rememberMe'); ?>
        <?php echo $form->error($model,'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <div class="pull-right">
            <?php echo CHtml::link('注册账号',array('u/register'));?>&nbsp;&nbsp;
            <?php global $sysSettings;?>
            <?php //if(isset($sysSettings['mailer']['enabled']) && $sysSettings['mailer']['enabled']):?>
            <?php 	echo CHtml::link('忘记密码?',array('u/forgetPassword'));?>
            <?php // endif;?>&nbsp;&nbsp;
            <?php echo CHtml::submitButton('登陆',array('class'=>'btn btn-primary')); ?>
        </div>
        <div class="clearfix"></div>

        <div class="pull-left" style="margin-top: 6px;">
            <?php $this->renderPartial('_oauth');?>
        </div>
        <div class="clearfix"></div>
    </div>

    <?php $this->endWidget(); ?>
</div>
