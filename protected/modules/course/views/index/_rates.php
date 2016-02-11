		<div class="dxd-dashboard-panel">
			<h4 class="dxd-panel-title">课程评价</h4>
			<div class="dxd-panel-content">

				<?php 
	$this->widget('bootstrap.widgets.TbListView', array(
	    'dataProvider'=>$rateDataProvider,
	    'itemView'=>'_rate_view',   // refers to the partial view named '_post'
		'emptyText'=>'暂时还没有评价',
		'summaryText'=>false,
		'separator'=>'<hr style="margin:10px 0;"/>'
	));
				?>
			</div>
		</div>

