<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
		$maxFileSize = floor(min(DxdUtil::return_bytes(ini_get('post_max_size')),
					   DxdUtil::return_bytes(ini_get('upload_max_filesize')),
					   DxdUtil::return_bytes(ini_get('memory_limit')))/1024/1024);
		$cloudStorageForm = new CloudStorageForm();
		$cloudStorageForm->getSetting();
		$storage = $cloudStorageForm->storage;
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
 //   'type'=>'horizontal',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
)); ?>

	<?php echo $form->errorSummary($model); ?>
 	<?php echo $form->textFieldRow($model,'title',array('class'=>'input-block-level'));?>
 <?php echo $form->radioButtonListInlineRow($model, 'isFree', array(
		'1'=>'是', 
		'0'=>'否'
    )); ?>
 	<?php echo $form->textAreaRow($model,'introduction',array('class'=>'input-block-level','style'=>'min-height:90px;'));?>

 <?php 
 		echo $form->radioButtonListInlineRow($model, 'mediaSource', array(
		'self'=>($storage == 'cloud')?'上传视频文件(*.mp4,*.flv)到云端':'上传视频文件(*.mp4,*.flv)到服务器', 
		'link'=>'导入外部视频链接'
    )); 
    //echo CloudService::getInstance()->test();
    ?>
    
    <div id="dxd-for-self" class="dxd-media-source <?php if($model->mediaSource!="self") echo 'dxd-hidden';?>">
    	<!--  
    	<?php echo $form->fileFieldRow($model,'mediaId',array('class'=>'btn'));?>
     	&nbsp;&nbsp;<?php if($model->file) echo "已上传文件:".$model->file->name;?> 
     	<br/><?php echo "最大允许上传文件".$maxFileSize."M";?>
     	&nbsp;&nbsp;<?php echo CHtml::link('如何修改?',"http://eduwind.com/index.php?r=group/post&id=33",array('target'=>'_blank'));?>
     	-->
    
    <?php  	
    if ($storage == 'cloud') {
    	$this->widget('ext.uploadify.MUploadify',CloudService::getInstance("uploads/uploadFile/lesson/mediaId/".DxdUtil::randCode(32))->getUploadifySetting());
    }
    else {
    	$this->widget('ext.uploadify.MUploadify',
	    	array(
			  'name'=>'file',
	    	  'buttonText'=>'选择文件',
	    	  'uploader'=>$this->createUrl('lesson/uploadVideo',array('courseId'=>$model->courseId)),
			  'auto'=>true,
			    //根据回调的结果更新表单的MediaId字段
			  'onUploadSuccess' =>"js:function(file, data, response) {
			   					dataObj = JSON.parse(data);
			   					$('input#mediaId').val(dataObj.id);
			   					$('p#uploadFileName').html('文件“' + file.name + '”已经上传成功。<a id=\"reUpload\" href=\"javaScript:void(0)\">重新上传</a>');
			   					$('.uploadify').uploadify('settings','buttonText','再次上传');
					        }",
			    'onQueueComplete'=>"js:function(queueData) {
			            $('div#file').addClass('dxd-hidden');
			        }"
		
		));
    }
    	echo $form->hiddenField($model,'mediaId',array('id'=>'mediaId'));
    ?>
    
    <div><pre><p id="uploadFileName" class="text-center text-info">还没有选择文件</p></pre></div>
    
    </div>
    <div id="dxd-for-link" class="dxd-media-source <?php if($model->mediaSource=="self") echo 'dxd-hidden';?>">
  		 <?php echo $form->textFieldRow($model,'mediaUri',array('class'=>'input-block-level'));?>  
    </div>
	<?php /*$this->widget('bootstrap.widgets.TbTabs', array(
	    'tabs'=>$this->getTabularFormTabs($form, $model),
	)); */?>	
	<?php // echo $form->textFieldRow($model,'homePage');?>
	<?php echo CHtml::submitButton($model->isNewRecord ? '保存' : '保存',array('class'=>'pull-right btn btn-primary ml10')); ?>

<?php $this->endWidget(); ?>
<div class="clearfix"></div>
</div><!-- form -->
<script>
$(document).ready(function(){

	$("input[name='Lesson[mediaSource]']").change(function() {
		$value = $("input[name='Lesson[mediaSource]']:checked").val() ;
		if ($value== 'self'){
			$('.dxd-media-source').hide();
			$('#dxd-for-self').show();
		}
	     //   $("output").text("a changed");
	    else if ($value == 'link'){
			$('.dxd-media-source').hide();
			$('#dxd-for-link').show();		    
	    }
	       // $("output").text("b changed");
	});
	$("a#reUpload").live("click",function(){
		  $("div#file").removeClass('dxd-hidden');
	});

	
});
</script>
<style>
.dxd-hidden{
display:none;
}
</style>