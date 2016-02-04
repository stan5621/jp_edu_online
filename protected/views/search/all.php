<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

?>
<div class="row ">
<?php 

?>
	<div class="span2">
		<?php $this->renderPartial('_side_nav',array('keyword'=>$keyword));?>
	</div>
	<div class="span10">
	
	<?php $this->renderPartial('_form',array('cate'=>'all','keyword'=>$keyword))?>

	<?php $totalCount = 
						$courseDataProvider->totalItemCount
						+$postDataProvider->totalItemCount
	//					+$questionDataProvider->totalItemCount
						+$groupDataProvider->totalItemCount
						+$userDataProvider->totalItemCount;?>
	<h5>搜索 "<em><b><?php echo CHtml::link($keyword,"#");?>"</b></em> 共得<?php echo $totalCount;?>条结果</h5>
 
	<h4>课程<?php echo CHtml::link("<em>  更多</em>",array('index', 'type'=>'course', 'keyword'=>$keyword),array('style'=>'font-size:0.8em'))?></h4>
	<hr style="margin:0px 0px 20px 0"/>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
	    'dataProvider'=>$courseDataProvider,
	    'template'=>"{items}",
	    'itemView'=>'_course',
		'separator'=>'<div style="margin: 20px 0"></div>',
			'viewData'=>array('keyword'=>$keyword),
		'emptyText'=>"没有找到相关课程"
	)); ?>
	<br/>

	<h4>讨论<?php echo CHtml::link("<em>  更多</em>",array('index', 'type'=>'post','keyword'=>$keyword),array('style'=>'font-size:0.8em'))?></h4>
	<hr style="margin:0px 0px 20px 0"/>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
	    'dataProvider'=>$postDataProvider,
	    'template'=>"{items}",
	    'itemView'=>'_post',
		'separator'=>'<div style="margin: 20px 0"></div>',
			'viewData'=>array('keyword'=>$keyword),
		'emptyText'=>"没有找到相关讨论"
			)); ?>
	
	<br/>
    
	<h4>用户<?php echo CHtml::link("<em>  更多</em>",array('index', 'type'=>'user', 'keyword'=>$keyword),array('style'=>'font-size:0.8em'))?></h4>
	<hr style="margin:0px 0px 20px 0"/>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
	    'dataProvider'=>$userDataProvider,
	    'template'=>"{items}",
	    'itemView'=>'_user',
		'separator'=>'<div style="margin: 20px 0"></div>',
			'viewData'=>array('keyword'=>$keyword),
		'emptyText'=>"没有找到相关用户"
		)); ?>
	<br/>
	
	<h4>小组<?php echo CHtml::link("<em>  更多</em>",array('index', 'type'=>'group', 'keyword'=>$keyword),array('style'=>'font-size:0.8em'))?></h4>
	<hr style="margin:0px 0px 20px 0"/>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
	    'dataProvider'=>$groupDataProvider,
	    'template'=>"{items}",
	    'itemView'=>'_group',
		'separator'=>'<div style="margin: 20px 0"></div>',
			'viewData'=>array('keyword'=>$keyword),
		'emptyText'=>"没有找到相关小组"
    )); ?>
    <br>
	
    
	<h4>新闻<?php echo CHtml::link("<em>  更多</em>",array('index', 'type'=>'article', 'keyword'=>$keyword),array('style'=>'font-size:0.8em'))?></h4>
	<hr style="margin:0px 0px 20px 0"/>
	<?php $this->widget('bootstrap.widgets.TbListView', array(
	    'dataProvider'=>$articleDataProvider,
	    'template'=>"{items}",
	    'itemView'=>'_article',
		'separator'=>'<div style="margin: 20px 0"></div>',
			'viewData'=>array('keyword'=>$keyword),
		'emptyText'=>"没有找到相关文章"
		)); ?>
	
	</div>
</div>

