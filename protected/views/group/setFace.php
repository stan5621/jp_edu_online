
<h3 class="dxd-fancybox-header">修改小组头像</h3>
<div class="dxd-fancybox-body">
<ul>
<li>支持图片格式为*.png,*.gif,*.jpg,*.jpeg，大小不能超过3MB；</li>
<li>建议图片的长高比约为1：1；</li>
</ul>
<p></p>
<?php 

$model = new XUploadForm;
$this->widget('xupload.XUpload', array(
                    'url' => $this->createUrl('group/setFace',array('id'=>$group->id)),
                    'model' => $model,
                    'attribute' => 'file',
					'multiple'=>false, 
					'autoUpload'=>true,
		            'options' => array(
		                'maxFileSize' => 3*1024*1024,
		                'acceptFileTypes' => "js:/(\.|\/)(jpe?g|png|gif)$/i",
		            ),
));/*
$this->widget('ext.EFineUploader.EFineUploader',
 array(
       'id'=>'FineUploader',
       'config'=>array(
                       'autoUpload'=>true,
                       'request'=>array(
                          'endpoint'=> $this->createUrl('group/setFace'),
                          'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                                       ),
                       'retry'=>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
                       'chunking'=>array('enable'=>true,'partSize'=>100),//bytes
                       'callbacks'=>array(
                                        'onComplete'=>"js:function(id, name, response){  }",
                                        'onError'=>"js:function(id, name, errorReason){ }",
                                         ),
                       'validation'=>array(
                                 'allowedExtensions'=>array('jpg','jpeg'),
                                 'sizeLimit'=>2 * 1024 * 1024,//maximum file size in bytes
                                 'minSizeLimit'=>2*1024,// minimum file size in bytes
                                          ),
                      )
      ));*/
?>
</div>

<div class="dxd-fancybox-footer">
</div>

