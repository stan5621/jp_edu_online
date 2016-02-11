<?php
/* @var $this MessageController */
/* @var $dataProvider CActiveDataProvider */

?>
<div class="row">
	<div class="span2">
		<?php $this->renderPartial("/me/_side_nav",array('user'=>$user));?>
	</div>
	<div class="span10">
		<h3 class="side-lined">私信信箱</h3>
		
		<?php $this->widget('bootstrap.widgets.TbListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_latest_item',
			'separator'=>'<hr/>',
			'summaryText'=>'第{start}-{end}人 共{count}人'
		)); ?>
		</div>
</div>
