<?php
/* @var $this CourseController */
/* @var $course Course */
$lesson = new Lesson;
$this->pageTitle = "$course->name";
?>

	<?php echo $this->renderPartial('_header', array('course'=>$course,'member'=>$member)); ?>
	
<div class="row dxd-course-body">

	<div class="span8 dxd-left-col">
		<?php // $this->renderPartial('_lessons',array('lessonDataProvider'=>$lessonDataProvider,'member'=>$member));?>	
		<?php  $this->renderPartial('_lessons_and_chapters',array('lessonsAndChapters'=>$lessonsAndChapters,'member'=>$member));?>	
	</div>
	
	<div class="span4 dex-right-col pull-right">
		<div class="hide dxd-dashboard-panel">
			<h4 class="dxd-panel-title">课程简介</h4>
			<div class="dxd-panel-content">
				<div class="dxd-course-introduction"><?php echo $course->introduction ? $course->introduction : "还没有介绍<br/><br/>" ;?></div>
			</div>
		</div>


        <!-- 课程公告 -->
        <div class="dxd-dashboard-panel  course-announcement">
            <h4 class="dxd-panel-title" >课程公告 <?php echo CHtml::link('全部 &gt', array('announcement/list', 'courseId'=>$course->id), array('onclick'=>'openFancyBox(this);return false;', 'class'=>'pull-right','style'=>'font-size:0.9em;;')); ?></h4>
            <div class="dxd-panel-content">
                <?php
                $this->widget('bootstrap.widgets.TbListView', array(
                    'dataProvider'  =>  $announcementDataProvider,
                    'itemView'      =>  '_announcement_item',
                	'separator'     =>'<hr style="margin:15px 0"/>',
                    'template'      =>  '{items}',
                ));
                ?>
            </div>
        </div>
        <?php // $this->renderPartial('_comments',array('commentDataProvider'=>$course->getCommentDataProvider(),'course'=>$course));?>
 	<?php 
	//	$this->renderPartial('/member/_items',array('title'=>'学员','memberDataProvider'=>$memberDataProvider) );
		$this->renderPartial('_students',array('studentDataProvider'=>$studentDataProvider) );
	?>       

	<?php //$this->renderPartial('_question',array('course'=>$course,'questionDataProvider'=>$questionDataProvider) );?>
	
	<?php //$this->renderPartial('_post',array('course'=>$course,'postDataProvider'=>$postDataProvider) );?>

	<?php // $this->renderPartial('_file',array('course'=>$course,'fileDataProvider'=>$fileDataProvider) );?>
	<?php // $this->renderPartial('_group',array('course'=>$course,'groupDataProvider'=>$groupDataProvider) );?>

	<?php //  $this->renderPartial('_rate',array('course'=>$course,'rateDataProvider'=>$rateDataProvider) );?>


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

