<div class="span9" style="margin-left:0">
	<?php 
		$this->widget('bootstrap.widgets.TbListView', array(
		    'dataProvider'=>$dataProvider,
		    'itemView'=>'_answer_item',   // refers to the partial view named '_post'
			'summaryText'=>false,
			'emptyText'=>'还没有回答',
			'separator' => '<hr style="margin:15px 0;"/>',
		));
	?>
</div>