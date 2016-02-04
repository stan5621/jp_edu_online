		<div class="dxd-dashboard-panel">
			<h4 class="dxd-panel-title">相关小组</h4>
			<div class="dxd-panel-content">

				<?php 
				$this->widget('bootstrap.widgets.TbListView', array(
				    'dataProvider'=>$groupDataProvider,
				    'itemView'=>'_group_item',   // refers to the partial view named '_post'
					'summaryText'=>false,
					'emptyText'=>'暂时还没有相关小组',
				));
				?>
				<div class="clearfix"></div>
			</div>
		</div>