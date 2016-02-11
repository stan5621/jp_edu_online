		<div class="dxd-dashboard-panel">
			<h4 class="dxd-panel-title">文档资料&nbsp;<?php if($course->fileCount>0)echo "（".$course->fileCount." 份）";?></h4>
			<div class="dxd-panel-content">
				<?php if(Yii::app()->user->id==$course->userId) echo CHtml::link("<i class='icon-upload'></i>上传文件",array('courseFile/create','courseId'=>$course->courseId),array('class'=>'btn pull-right dxd-fancy-elem'));?>
				<div class="clearfix"></div>
				<?php 
				$this->widget('bootstrap.widgets.TbListView', array(
				    'dataProvider'=>$fileDataProvider,
				    'itemView'=>'_file_item',   // refers to the partial view named '_post'
					'summaryText'=>false,
					'emptyText'=>'暂时还没有文档资料',
				));
				?>
				<div class="clearfix"></div>
			</div>
		</div>