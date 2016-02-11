		<div class="dxd-dashboard-panel">
			<h4 class="dxd-panel-title">授课人员</h4>
			<div class="dxd-panel-content">

				<?php 
	$this->widget('bootstrap.widgets.TbListView', array(
	    'dataProvider'=>$teacherDataProvider,
	    'itemView'=>'_teacher_item',   // refers to the partial view named '_post'
		'emptyText'=>'暂时还没有指定授课人员',
		'summaryText'=>false,
		'separator'=>'<hr style="margin:10px 0;"/>'
	));
				?>
			</div>
		</div>

