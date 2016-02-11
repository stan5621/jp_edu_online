<h3 class="dxd-fancybox-header">上传文件</h3>
<div class="dxd-fancybox-body">

<?php
$cloudStorageForm = new CloudStorageForm();
$cloudStorageForm->getSetting();
$storage = $cloudStorageForm->storage;
?>

	<br />

	<div id="dxd-for-self"
		class="dxd-media-source <?php if($model->mediaSource!="self") echo 'dxd-hidden';?>">

		<?php
		if ($storage == 'cloud') {
			$cloudService = CloudService::getInstance("uploads/uploadFile/lesson/mediaId/".DxdUtil::randCode(32));
		//	$cloudService = new CloudService();
			$this->widget('ext.uploadify.MUploadify',
			array(
				  'name'=>'file',
		    	  'buttonText'=>'选择文件',
				  'auto'=>true,
				  'uploader'=>'http://up.eduwind.com',
		   		  'formData'=>array(	//此处插入post到服务器的数据
				    			'token'=>$cloudService->makeUploadToken(),
		    					'key'=>$cloudService->getKey(),
					),
	/*	   'onUploadStart'=>"js:function(file) {
    				$.ajax({
    			//		url:'".Yii::app()->createAbsoluteUrl('cloud/uploadUrl')."',
    					url:'http://up.eduwind.com',
    					async:false,
    					success:function(data){
    						dataObj = JSON.parse(data);
    						$('.uploadify').uploadify('settings','uploader',dataObj.url);
    					}
    				});
		   					
		   }",*/
			//根据回调的结果更新表单的MediaId字段
		   'onUploadSuccess' =>"js:function(file, data, response) {
			   					dataObj = JSON.parse(data);
			   					if(data){
			  						$('#uploaded-file-$model->id').html('<span style=\'text-success\'>“' + file.name + '</span>”已经上传成功。');
			  						$.post('".$this->createUrl('setMedia',array('lessonId'=>$model->id))."',{name:file.name,mediaId:dataObj.id});
									}else{
			  						$('#uploaded-file-$model->id').html('<span style=\'text-error\'>“' + file.name + '</span>”上传失败。');
    							}
					}",
			    'onQueueComplete'=>"js:function(queueData) {
			            $('div#file').addClass('dxd-hidden');
			        }"
		
			
			        ));
			        //    	$this->widget('ext.uploadify.MUploadify',CloudService::getInstance("uploads/uploadFile/lesson/mediaId/".DxdUtil::randCode(32))->getUploadifySetting());
			        //    	CloudService::getInstance()->cloudService();
		}
		else {
			$this->widget('ext.uploadify.MUploadify',
			array(
			  'name'=>'file',
	    	  'buttonText'=>'选择文件',
	    	  'uploader'=>$this->createUrl('upload',array('lessonId'=>$model->id)),
			  'auto'=>true,
			//根据回调的结果更新表单的MediaId字段
			  'onUploadSuccess' =>"js:function(file, data, response) {
			   					if(data){
			  						$('#uploaded-file-$model->id').html('<span style=\'text-success\'>“' + file.name + '</span>”已经上传成功。');
			  					}else{
			  						$('#uploaded-file-$model->id').html('<span style=\'text-error\'>“' + file.name + '</span>”上传失败。');
    							}
					        }",
			    'onQueueComplete'=>"js:function(queueData) {
			            $('div#file').addClass('dxd-hidden');
			        }"
		
			        ));
		}
		//	echo $form->hiddenField($model,'mediaId',array('id'=>'mediaId'));
		?>
		<!-- 
    <div><pre><p id="uploadFileName" class="text-center text-info">还没有选择文件</p></pre></div>
     -->
		<br /> <em id='uploaded-file-<?php echo $model->id;?>'> <?php if($model->file): echo "已上传文件: ".$model->file->name;?>
		<?php else: echo "暂无上传文件";
		endif;
		?> </em>
	</div>

</div>

<div class="dxd-fancybox-footer"></div>
