		<div class="dxd-dashboard-panel">
					<?php echo CHtml::link('全部帖子',array('post/index','courseId'=>$course->id),array('class'=>'pull-right dxd-course-edit'));?>
			<h4 class="dxd-panel-title">讨论区</h4>
			<div class="dxd-panel-content">
				<?php echo CHtml::link("<i class='icon-pencil'></i>发布新帖",array('post/create','courseId'=>$course->id),array('class'=>'btn pull-right'));?>
				<div class="clearfix"></div>
				<?php 
				$this->widget('bootstrap.widgets.TbListView', array(
				    'dataProvider'=>$postDataProvider,
				    'itemView'=>'_post_item',   // refers to the partial view named '_post'
					'summaryText'=>false,
					'template'=>'{items}',
					'separator' => '<hr style="margin:10px 0;"/>',
					'emptyText'=>'暂时还没有人发帖',
				));
				?>
			</div>
		</div>