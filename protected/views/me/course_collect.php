<script type="text/javascript">
<!--

//-->

</script>
<div class="row">
	<div class="span2 ">
		<?php $this->renderPartial("_side_nav",array('user'=>$user));?>
	</div>
	<div class="span10">
		<h3 class="side-lined">我的课表</h3>
		<?php $this->widget('bootstrap.widgets.TbMenu', array(
		    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		    'items'=>array(
		        array('label'=>'参加', 'url'=>array("me/courseJoin")),
		        array('label'=>'收藏', 'url'=>array("me/courseCollect")),
		 //       array('label'=>'完成', 'url'=>array("me/courseLearned")),
		        array('label'=>'我管理的', 'url'=>array("me/courseAdmin") ),
		    ),
		    "htmlOptions"=>array('class'=>"dxd-course-status")
		)); ?>
		<div class="dxd-course-status-content">
		<?php 
			$link = CHtml::link('<em>点击这里找到课程</em>',array('course/index'));
			$this->widget('bootstrap.widgets.TbThumbnails', array(
				    'dataProvider'=>$courseDataProvider,
				    'template'=>"{items}\n{pager}",
				    'itemView'=>'/course/_card',
					'emptyText'=>'课程列表为空 '.$link,
				));
	?>
	</div>
	</div>
</div>