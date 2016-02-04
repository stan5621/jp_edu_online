<?php
/* @var $this UserController */
/* @var $model UserInfo */

?>
<h2>上传个人头像</h2>
<hr/>
<div class="span6 center dxd-set-face">
<p>验证成功！请上传个人头像</p>
<ul>
<li>支持图片格式为*.png,*.gif,*.jpg,*.jpeg，大小不能超过2MB；</li>
<li>建议图片的长高比约为1：1；</li>
</ul>
<p></p>
<?php 
$model = new XUploadForm;
$this->widget('xupload.XUpload', array(
                    'url' => $this->createUrl('me/setFace',array('id'=>$id)),
                    'model' => $model,
                    'attribute' => 'file',
					'multiple'=>true, 
					'autoUpload'=>true,
		            'options' => array(
		                'maxFileSize' => 3*1024*1024,
		                'acceptFileTypes' => "js:/(\.|\/)(jpe?g|png|gif)$/i",
		            ),
));
?>
<div class="pull-right">
<?php echo CHtml::link('跳过',Yii::app()->baseUrl."/");?>&nbsp;
<?php echo CHtml::link('完成',Yii::app()->baseUrl."/",array('class'=>'btn btn-success ml10'));?>
</div>
</div>
<<style>
<!--

-->
.dxd-set-face img{
width:120px;
height:120px;
}
</style>

