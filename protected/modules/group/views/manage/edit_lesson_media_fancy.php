<h3 class="dxd-fancybox-header">编辑课时</h3>
<div class="dxd-fancybox-body">

	 <ul class="nav nav-tabs">
	    <li class="active"><a href="#tab1" data-toggle="tab">上传本地视频</a></li>
	    <li><a href="#tab2" data-toggle="tab">导入在线视频</a></li>
	  </ul>
	  <div class="tab-content">
	    <div class="tab-pane active" id="tab1">
	    	<?php if($lesson->file && $lesson->mediaSource=="self"):?>
	    	<p>当前视频：<?php echo $lesson->file->name;?></p>
	    	<?php endif;?>
			<?php 
			
			$this->widget('xupload.XUpload', array(
			                    'url' => $this->createUrl('groupManage/uploadLessonFile',array('id'=>$lesson->id)),
			                    'model' => new XUploadForm,
			                    'attribute' => 'file',
								'multiple'=>false, 
								'autoUpload'=>true,
					            'options' => array(
					                'maxFileSize' => 200*1024*1024,
					                'acceptFileTypes' => "js:/(\.|\/)(mp4|swf|flv)$/i",
					            ),
			));
			?>    
		</div>
	    <div class="tab-pane" id="tab2">
	    	    <?php /** @var BootActiveForm $form */
			$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			    'id'=>'horizontalForm2',
				'action'=>array('groupManage/updateLessonByUri'),
			)); ?>
			<div class="row">
				<?php echo $form->textFieldRow($lesson,'mediaUri',array('class'=>'input-block-level')); ?>
			</div>
			<div class="row buttons">
				<?php $this->widget('bootstrap.widgets.TbButton',
					array('label'=>'保存','buttonType'=>'submit','type'=>'primary',
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

