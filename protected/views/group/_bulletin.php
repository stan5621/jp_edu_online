		<div class="dxd-dashboard-panel">
		<div class="pull-right dxd-course-edit">
				<?php if($role=="superAdmin")
					echo CHtml::link("<i class='icon-pencil'></i>发布公告",array('bulletin/create','groupid'=>$group->id),array('class'=>''));?>
  &nbsp;&nbsp;
			<?php echo CHtml::link('更多',array('bulletin/index','groupid'=>$group->id),array('class'=>' '));?>
		</div>			
			<h4 class="dxd-panel-title">公告栏</h4>
			<div class="dxd-panel-content">

				
				<div>		
				<?php  echo (isset($bulletin->content) ? $bulletin->content : "还没有公告");?>
				
				<div class="clearfix"></div>
				</div>
				<div>
			<?php if($role=='superAdmin'):?>
			<?php echo CHtml::link('编辑',array('bulletin/update','id'=>$bulletin->id),array('class'=>'muted pull-right'));?>
			<?php endif;?>
			</div>
				<div class="clearfix"></div>
			</div>
		</div>