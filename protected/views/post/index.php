<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

//echo $this->renderPartial('//group/_header_short', array('group'=>$group));
 $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array($group->name=>array('group/view','id'=>$group->id), 
 					'讨论区'),
 	'homeLink'=>false)); 

?>
<h3>帖子列表</h3>
<div class="row dxd-group-body">
	<div class="span9 dxd-left-col">

	<?php 
	/*$this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$dataProvider,
		//'itemView'=>'_view',
		'columns'=>array(
			array(
				'class'=>'CLinkColumn',
				'header'=>'标题',
	        	'labelExpression'=>'$data->title',
	            'urlExpression'=>'Yii::app()->createUrl("post/view", array("id"=>$data->id))',
				//'name'=>'标题',
				//'type' => 'raw',
				//'value' => 'CHtml::link($data->title,Yii::app()->createUrl("post/view", array("id"=>$data->id)))'
			),
			//'user.username',
			array(
				'name'=>'作者',
				'value'=>'$data->user->name',
				//'htmlOptions'=>array('width'=>'40'),
			),
			array(
				'name'=>'回复',
				'value'=>'$data->commentCount',
			),
			array(
				'name'=>'最后回复',
				'value'=>'date("y-m-d H:i",$data->upTime)',
				'htmlOptions'=>array('class'=>'muted'),
			),
	//		'upTime:date',
	// 			array(
	// 					'name'=>'newColumn',
	// 					//call the method 'gridDataColumn' from the controller
	// 					'value'=>array($this,'gridDataColumn'),
	// 			),
	// 			array(
	// 					'name'=>'Address',
	// 					//call the method 'renderAddress' from the model
	// 					'value'=>array($model,'renderAddress'),
	// 			),
		),
		'template'=>"{items}\n{pager}",
	)); */
					$this->widget('bootstrap.widgets.TbListView', array(
				    'dataProvider'=>$dataProvider,
				    'itemView'=>'_post_item',   // refers to the partial view named '_post'
					'summaryText'=>false,
					'separator' => '<hr style="margin:10px 0;"/>',
				));
	?>
	</div>
	<div class="span3 ">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
    		'label'=>'<i class="icon-pencil"></i> 发布新帖子',
    		'block'=>true,
			'url'=>array('post/create','groupid'=>$group->id),
			'encodeLabel'=>false
		)); ?>
	</div>
</div>

<br/>
<br/>
<style type="text/css">
.grid-view{
padding-top:0px;
}
</style>