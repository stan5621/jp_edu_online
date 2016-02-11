<div class="span6 offset2">
    <?php $form=$this->beginWidget(
        'bootstrap.widgets.TbActiveForm'
    ); ?>
        <?php 
        echo $form->labelEx($model, 'userName');
        $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
            'name'=>'People[userName]',
            'sourceUrl'=>array('//u/fetchNames'),
            'value' =>  $model->user['name'],
            'htmlOptions'=>array(
                'placeHolder'=>'请输入用户名，（只能添加已注册用户）',
                'class'=>'span3',
            )
        )); 
        ?>
        <?php echo $form->textFieldRow($model, 'name'); ?>
        <?php echo $form->dropDownListRow($model, 'categoryId', CHtml::listData($model->categorys, 'id', 'name')); ?>
        <?php echo $form->textAreaRow($model, 'description', array('rows'=>6, 'class'=>'span5')); ?>
        <br>
        <?php echo CHtml::submitButton('保存', array('class'=>'btn btn-primary')); ?>
    <?php $this->endWidget(); ?>
</div>
