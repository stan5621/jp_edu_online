
<h3 class="dxd-fancybox-header">设置用户组</h3>
<div class="dxd-fancybox-body">
<div class="form">

<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>


    <?php echo $form->checkBoxListInlineRow($member, 'arrRoles',$roleItems); ?>
    <br/>
    <br/>
	<div class="row buttons">
<?php $this->widget('bootstrap.widgets.TbButton',
					array('label'=>'保存','buttonType'=>'submit','type'=>'primary',
					'htmlOptions'=>array('class'=>'pull-right'))
					);?>
	<div class="clearfix"></div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<div class="dxd-fancybox-footer">
</div>