<?php ?>
<div style="border-top:1px solid #ddd;padding-top:20px;">
	<div class="row">
		<div class="span3">	
			<div style="padding-left:20px;color:#666;">	
				<span class="lead">第&nbsp;<?php echo $data->number;?>&nbsp;章&nbsp;&nbsp;
				<?php echo $data->title;?>	
				</span>	
			</div>
		</div>
		<div class="span9">
			<div style="border-left:1px dashed #ddd;padding-left:25px;padding-bottom:20px;">
				<?php 
					$this->widget('bootstrap.widgets.TbListView', array(
					    'dataProvider'=>new CArrayDataProvider($data->lessons,array('keyField'=>'id','pagination'=>array('pageSize'=>100))),
					    'itemView'=>'_progress_lesson_item',   // refers to the partial view named '_post'
						'summaryText'=>false,
	                    'template'   =>  '{items}',
						'viewData'=>array('user'=>$user),
						'emptyText'=>'还没有课时！',
					));
				?>
			</div>
		</div>
	</div>

</div>
