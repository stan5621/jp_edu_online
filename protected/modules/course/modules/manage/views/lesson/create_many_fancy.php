<h3 class="dxd-fancybox-header">导入外部视频</h3>
<div class="dxd-fancybox-body">
	 <ul class="nav nav-tabs">
	    <li class="active"><a href="#tab1" data-toggle="tab">批量导入视频</a></li>
	  </ul>
	  <div class="tab-content">
	    <div class="tab-pane active" id="tab1">
  		<p class="lead">支持从优酷导入视频</p>
  	    	    <?php /** @var BootActiveForm $form */
			$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			    'id'=>'horizontalForm2',
				'action'=>array('createMany','courseId'=>$course->id),
			)); ?>
			<div class="row">
				<?php //echo $form->textFieldRow($lesson,'mediaUri',array('class'=>'input-block-level','value'=>'请输入优酷专辑地址')); ?>
			</div>
				<input type="text" name="playList" placeHolder="请输入优酷专辑地址" class="input-block-level"/>
			<div class="row buttons">
				<?php $this->widget('bootstrap.widgets.TbButton',
					array('label'=>'提交','buttonType'=>'submit','type'=>'primary',
					'htmlOptions'=>array('class'=>'pull-right'))
					);?>
	<div class="clearfix"></div>
	</div>
			<?php $this->endWidget(); ?>
   
		</div>

	  </div> 
</div>

<div class="dxd-fancybox-footer">
</div>

