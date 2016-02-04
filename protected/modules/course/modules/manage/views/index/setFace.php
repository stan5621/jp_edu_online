
<h3 class="dxd-fancybox-header">修改课程封面图片</h3>
<div class="dxd-fancybox-body">
<ul>
<li>支持图片格式为*.png,*.gif,*.jpg,*.jpeg，大小不能超过2MB；</li>
<li>建议图片的长高比约为2:1；</li>
</ul>
<p></p>
<?php 

$model = new XUploadForm;
$this->widget('ext.xupload.XUpload', array(
                    'url' => $this->createUrl('/course/index/setFace',array('id'=>$course->id)),
                    'model' => $model,
                    'attribute' => 'file',
					'multiple'=>false, 
					'autoUpload'=>true,
		            'options' => array(
		                'maxFileSize' => 2*1024*1024,
		                'acceptFileTypes' => "js:/(\.|\/)(jpe?g|png|gif)$/i",
		            ),
));
?>
</div>

<div class="dxd-fancybox-footer">
</div>

