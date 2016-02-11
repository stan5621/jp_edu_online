<h3 class="dxd-fancybox-header">所有公告</h3>
<div class="dxd-fancybox-body" style="min-width: 300px">
    <?php
    $widget = $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider'  =>  $announcementDataProvider,
        'itemView'      =>  '_list_item',
        'template'      =>  '{items}{pager}',
        'id'            =>  'announcement-list',
    	'separator'	=>'<hr style="margin:15px 0;"/>',
    ));
    ?>
</div>
<div class="dxd-fancybox-footer"> </div>
