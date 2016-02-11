<div class="form span8">
    <?php $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'enableClientValidation'=>true,
        )
    ); ?>

        <?php echo $form->textAreaRow($model, 'html', array('class'=>'span8', 'rows'=>15, 'disabled'=>false)); ?>
        
        <br>
        <?php echo CHtml::submitButton('保存', array('class'=>'btn btn-success pull-right')); ?>
        <?php echo CHtml::button(
            '恢复默认',
            array(
                'class'     =>  'btn btn-default pull-right',
                'style'     =>  'margin-right:1em',
                'onclick'   =>  'location.href="' . CHtml::normalizeUrl(array('recover')) . '"',
            )
        ); ?>
    <?php $this->endWidget(); ?>
</div>
