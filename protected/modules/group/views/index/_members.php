		<div class="dxd-dashboard-panel">
			<h4 class="dxd-panel-title"><?php echo isset($title)?$title:"成员";?>（<?php echo $memberDataProvider->totalItemCount;?>人）</h4>
			<div class="dxd-panel-content">

				<?php 
			//	var_dump($memberDataProvider);
				$this->widget('bootstrap.widgets.TbListView', array(
				    'dataProvider'=>$memberDataProvider,
				    'itemView'=>'_member_item',   // refers to the partial view named '_post'
					'summaryText'=>false,
					'emptyText'=>'暂时还没有成员',
				));
				?>
				<div class="clearfix"></div>
			</div>
		</div>