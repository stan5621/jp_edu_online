<?php
/* @var $this UserController */
/* @var $model UserInfo */

?>
<?php
/* @var $this CourseManageController */
/* @var $dataProvider CActiveDataProvider */
 $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
 	'homeLink'=>false,
    'links'=>array($model->name=>array('/course/index/view','id'=>$model->id), "课程管理"),
)); 
?>

<div class="row ">

	<div class="span2 dxd-course-category">
	<?php $this->renderPartial('_side_nav',array('course'=>$model));?>
	</div>
	<div class="span10">
	<h3 class="side-lined">封面图片</h3>
<p>请上传个人头像</p>
<ul>
<li>支持图片格式为*.png,*.jpg,*.jpeg，大小不能超过2MB；</li>
</ul>
<p></p>

<?php 

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
));
$this->widget('ext.jcrop.EJcrop', array(
    //
    // Image URL
//    'url' => $this->createAbsoluteUrl('/path/to/full/image.jpg'),
	'url'=>Yii::app()->baseUrl."/".$model->face,
	//
    // ALT text for the image
    'alt' => 'Crop This Image',
	'boxHeight'=>200,
    //
    // options for the IMG element
    'htmlOptions' => array('id' => 'imageId'),
    //
    'options' => array(
        'minSize' => array(100, 50),
        'aspectRatio' => 1.35,
        'onRelease' => "js:function() {ejcrop_cancelCrop(this);}",
    ),
    'setSelect'=>array(0,0,540,400),
));

?>
<div class="pull-right">
<?php $this->widget('bootstrap.widgets.TbButton',array('label'=>'完成','buttonType'=>'submit','type'=>'success'));?>
</div>
<?php $this->endWidget();?>
			
	</div>
</div>

