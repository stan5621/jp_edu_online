<div class="tabbable course-list"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">热门课程</a></li>
    <li><a href="#tab2" data-toggle="tab">推荐课程</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <?php 
      	$this->widget('bootstrap.widgets.TbListView', array(
		    'dataProvider'=>new CActiveDataProvider('Course',array('criteria'=>array('order'=>'studentNum desc'),'pagination'=>array('pageSize'=>10))),
		    'itemView'=>'_list_item',   // refers to the partial view named '_post'
			'summaryText'=>false,
			'template'=>'{items}',
			'separator'=>'<hr style="margin:8px 0;border:1px dashed #ccc" />'
		//	'emptyText'=>'暂时还没有收藏课程',
		));
      ?>
    </div>
    <div class="tab-pane" id="tab2">
      <?php 
      	$this->widget('bootstrap.widgets.TbListView', array(
		    'dataProvider'=>new CActiveDataProvider('Course',array('criteria'=>array('order'=>'isTop desc'),'pagination'=>array('pageSize'=>10))),
		    'itemView'=>'_list_item',   // refers to the partial view named '_post'
			'summaryText'=>false,
			'template'=>'{items}',
			'separator'=>'<hr style="margin:8px 0;border:1px dashed #ccc" />'
		//	'emptyText'=>'暂时还没有收藏课程',
		));
      ?>
    </div>
  </div>
</div>
