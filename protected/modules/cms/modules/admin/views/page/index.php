<?php
/* @var $this CourseManageController */
/* @var $dataProvider CActiveDataProvider */

?>

		<h3 class="side-lined">页面管理</h3>
		<?php echo CHtml::link('添加页面',array('page/create'),array('class'=>'btn btn-success ','style'=>'margin:0 10px'));
		?>	
<div class="dxd-lession-order-list">
<?php 
$this->widget(
    'bootstrap.widgets.TbListView',
    array(
        'dataProvider'  =>  $pageDataProvider,  
        'itemView'      =>  '_page_item', 
        'itemsTagName'       =>  'ul',
    )
);
?>
</div>

<style type="text/css">
.dxd-lession-order-list{
margin-top:20px;
}
.dxd-lession-order-list li{
	 background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    line-height: 40px;
    padding:0 15px;
    margin-bottom: 15px;
}
.dxd-lession-order-list li:hover{
    background: none repeat scroll 0 0 #F3F3F3;
}
</style>
