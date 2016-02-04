<?php
/* @var $this CourseController */
/* @var $model Course */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->textFieldRow($model,'name',array('maxlength'=>64,'class'=>'input-block-level')); ?>
<br/><br/>	
    <?php // echo $form->dropDownListRow($model, 'id', $cateItems); ?>
    
    <?php 
//    echo $form->dropDownListRow($model, 'categoryId',CHtml::listData($categorys,'id','name')); 
 //   echo CHtml::dropDownList('categoryId')

    $categories = Category::model()->findAllByAttributes(array('type'=>'course','parentId'=>0));
 	$firstItems = CHtml::listData($categories, 'id', 'name');

    echo $form->labelEx($model,'categoryId');
   	if($model->categoryId){
 		$category = Category::model()->findByPk($model->categoryId); 		
 		echo "<div>当前分类：";
 		if($category && $category->parent) echo $category->parent->name." / ";
 		if($category) echo $category->name."</div>";
 	}  

   	echo CHtml::dropDownList('parentId',"", $firstItems,
			array(
			'empty'=>'选择分类',
			'ajax' => array(
			'type'=>'GET', //request type
			'url'=>CController::createUrl('//category/children'), //url to call.
			//Style: CController::createUrl('currentController/methodToCall')
			'update'=>'#cateId', //selector to update
			//'data'=>'js:javascript statusment' 
			//leave out the data key to pass all form values through
			),
			//'options'=>array('0'=>array('disabled'=>true))
			)); 

		echo  "&nbsp;&nbsp;&nbsp";

//empty since it will be filled by the other dropdown
		echo $form->dropDownList($model,'categoryId',array(), array('id'=>'cateId'));
		echo $form->error($model,'categoryId'); 

?>

	<div class="row buttons">
<?php $this->widget('bootstrap.widgets.TbButton',array('label'=>$model->isNewRecord ? '创建' : '保存','buttonType'=>'submit','type'=>'primary'));?>
	</div>
<div class="clearfix"></div>
<?php $this->endWidget(); ?>

</div><!-- form -->