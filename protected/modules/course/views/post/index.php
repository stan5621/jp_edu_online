<?php
/* @var $this CourseController */
/* @var $course Course */
$lesson = new Lesson;
$this->pageTitle = "$course->name";
?>
	<?php echo $this->renderPartial('/index/_header', array('course'=>$course,'member'=>$member)); ?>
	
<div class="row dxd-course-body">
	<div class="span8 dxd-left-col">
		<?php $this->renderPartial('_form',array('courseId'=>$course->id));?>
		<div class="dxd-lesson-comments">
		<?php $this->renderPartial('_items',array('dataProvider'=>$dataProvider,
							'courseId'=>$course->id,'showSource'=>true));?>		
		</div>
	</div>
	
	<div class="span4 dex-right-col pull-right">
		<div class="lead" style="color:#e6645e">
			<i class="icon-flag"></i>&nbsp;&nbsp;回复光荣榜 
		</div>
		<hr/>
		<div>
			<?php
			/* @var $this LessionController */
			/* @var $data Lession */
			$this->widget('bootstrap.widgets.TbListView',array(
						'dataProvider'=>$memberDataProvider,
						'itemView'=>'_member',
						'separator'=>'<hr/>',
						'template'=>'{items}',
						'emptyText'=>'还没有回复',
					));
			?>
						
		</div>
	</div>

</div>

<script type="text/javascript">
$(document).ready(function(){
//	$('a.dxd-create-lesson').fancybox();
	var l = window.location;
	var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
	var introduction = $('.dxd-course-introduction').html();
	$('a.dxd-course-ajax').click(function(){
		$('.dxd-course-body').load($(this).attr('href'));
		$('.dxd-course-header .nav-pills li').removeClass('active');
		return false;
	});

	$('.dxd-course-introduction-edit1').click(function(){
		$('.dxd-course-introduction-guide').show();
		$('.dxd-course-introduction-edit1').hide();
		$('.dxd-course-introduction-edit2').show();		
	});

	$('.dxd-course-introduction-edit2').click(function(){
		$('.dxd-course-introduction-guide').hide();		
		$('.dxd-course-introduction-edit2').hide();
		$('.dxd-course-introduction-edit1').show();		
	});

	
});
</script>

<?php // Yii::app()->clientScript->registerScript("viewNum", '$.get("'.Yii::app()->createUrl('counter',array('id'=>$course->id)).'");');?>

