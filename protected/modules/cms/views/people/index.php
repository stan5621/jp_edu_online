<?php
/* @var $this TeacherController */

$this->breadcrumbs=array(
	'Teacher',
);
?>

<div class="ew-teacher row">
    <div class="span12">
        <div class="small-menu">
            <?php $this->renderPartial('_nav', array('categorys'=>$categorys)); ?>
        </div>
    </div>

    <div class="items span12">
        <?php $this->widget(
            'bootstrap.widgets.TbListView',
            array(
                'dataProvider'  =>  $dataProvider,
            	'template'=>'{items}{pager}',
                'itemView'      =>  '_view',
                'separator'     =>  '<hr>',
            )
        ); ?>
    </div>
</div>
<br/><br/>
