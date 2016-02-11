<?php
/* @var $this CourseManageController */
/* @var $dataProvider CActiveDataProvider */
 $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
 	'homeLink'=>false,
    'links'=>array($course->name=>array('/course/index/view','id'=>$course->id), "课程管理"),
)); 
?>

<div class="row ">

	<div class="span2 dxd-course-category">
	<?php $this->renderPartial('_side_nav',array('course'=>$course));?>
	</div>
	<div class="span10">
		<h3 class="side-lined">成员管理</h3>
<div>
<?php echo CHtml::link('<i class="icon-plus icon-white"></i>添加成员',"#",array('class'=>'btn btn-success','data-toggle'=>'collapse','data-target'=>'#collapseOne'))?>
   <div id="collapseOne" class="collapse">
        
<?php 
$model=new CourseMember();
unset($model->userId);
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'course-form',
	'action'=>array('addMember','id'=>$course->id),
	'enableAjaxValidation'=>false,
)); ?>


	<?php //echo $form->textFieldRow($model,'userId',array('maxlength'=>64,'class'=>'input-block-level')); ?>
<br/>	
 	<?php echo $form->hiddenField($model,'courseId',array('value'=>$model->courseId));?>
	<?php echo $form->checkBoxListInlineRow($model,'arrRoles',array('admin'=>'管理员','teacher'=>'人员','student'=>'学生')); ?><br/>
    <?php echo $form->labelEx($model,'userId');?>
    <?php 
    $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
 	'name'=>'userName',
    //'source'=>array('11','ac2','ac3'),
    // additional javascript options for the autocomplete plugin
    'sourceUrl'=>array('//u/fetchNames'),
    'htmlOptions'=>array(
      //  'style'=>'height:20px;',
 		'placeHolder'=>'请输入用户名，（只能添加已注册用户）',
 		'class'=>'span4'
    ),
));


?>
<br/>
<?php $this->widget('bootstrap.widgets.TbButton',array('label'=>'提交','buttonType'=>'submit','type'=>'primary'));?>
<div class="clearfix"></div>

<?php $this->endWidget(); ?>
    </div>
</div>		

<h4>超级管理员</h4>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
			    'dataProvider'=>$superAdminDataProvider,
			    'template'=>"{items}\n{pager}",
				'separator'=>'<hr style="margin:10px 0;"/>',
				'viewData'=>array('course'=>$course),
				'itemView'=>'_member_item',   // refers to the partial view named '_post'
		)); ?>	
		<br/>
<h4>管理员</h4>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
			    'dataProvider'=>$adminDataProvider,
			    'template'=>"{items}\n{pager}",
				'separator'=>'<hr style="margin:10px 0;"/>',
				'emptyText'=>'暂时还没有',
				'viewData'=>array('course'=>$course),
				'itemView'=>'_member_item',   // refers to the partial view named '_post'
		)); ?>
				<br/>
		
<h4>人员</h4>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
			    'dataProvider'=>$teacherDataProvider,
			    'template'=>"{items}\n{pager}",
				'separator'=>'<hr style="margin:10px 0;"/>',
				'emptyText'=>'暂时还没有',
				'viewData'=>array('course'=>$course),
				'itemView'=>'_member_item',   // refers to the partial view named '_post'
		)); ?>	
				<br/>
		
<h4>学员</h4>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
			    'dataProvider'=>$studentDataProvider,
			    'template'=>"{items}\n{pager}",
				'emptyText'=>'暂时还没有',
				'separator'=>'<hr style="margin:10px 0;"/>',
				'viewData'=>array('course'=>$course),
				'itemView'=>'_member_item',   // refers to the partial view named '_post'
		)); ?>

<h4>其他</h4>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
			    'dataProvider'=>$otherDataProvider,
			    'template'=>"{items}\n{pager}",
				'emptyText'=>'暂时还没有',
				'separator'=>'<hr style="margin:10px 0;"/>',
				'viewData'=>array('course'=>$course),
				'itemView'=>'_member_item',   // refers to the partial view named '_post'
		)); ?>
		
	</div>	
</div>

