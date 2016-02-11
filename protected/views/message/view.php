<?php
/* @var $this MessageController */
/* @var $model Message */


?>

<div class="row">
	<div class="span2">
		<?php $this->renderPartial("/me/_side_nav");?>
	</div>
	<div class="span10">
		<h3 class="side-lined">与<?php echo CHtml::link($user->name,$user->pageUrl);?>的会话</h3>
		<?php echo CHtml::link('<i class="icon-chevron-left"></i>返回信箱',array('message/index'),array('class'=>'btn'));?>
				<?php
		 $this->widget('bootstrap.widgets.TbButton', array(
   		'label'=>'<i class="icon-envelope"></i>写私信',
   	 	'url'=>array('message/create','toUserId'=>$user->id),
		'htmlOptions'=>array('style'=>'margin:0 5px;','class'=>"dxd-message-btn",'onclick'=>'openFancyBox(this);return false;'),
		'encodeLabel'=>false,
		 )); 
//	echo CHtml::ajaxLink('私信',array('message/create','toUserId'=>$user->id),array('update'=>'#fancybox-tmp','complete'=>'fancyAfterAjax'),array('class'=>'btn btn-small'));
	?>
		<?php $this->widget('bootstrap.widgets.TbListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			'separator'=>'<hr/>'
		)); ?>
		</div>
</div>

