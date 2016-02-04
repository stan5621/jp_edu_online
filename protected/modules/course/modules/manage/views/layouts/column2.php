<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
<div class="row">
<div class="span12" style="margin-top:20px">

	<?php
	if(!empty($this->breadcrumbs)){
		$this->widget('bootstrap.widgets.TbBreadcrumbs',array('homeLink'=>false,'links'=>$this->breadcrumbs)); 
	}
	// echo CHtml::link('<i class="icon-arrow-left"></i>返回'.$this->course->name,array('/course/index/index'),array('class'=>'btn','style'=>'margin-left:20px;'));?>
</div>
</div>
<div class="row ">

	<div class="span2 dxd-course-category">
	<?php $this->renderPartial('/index/_side_nav',array('course'=>$this->course));?>
	</div>
	<div class="span10">
		<?php
			echo $content;
		?>
	</div>
</div>
</div>
<?php $this->endContent(); ?>