<div style="margin-top: 20px">
<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
        array('label'=>'小组信息'),
        array('label'=>'基本信息','url'=>array('setBasic','id'=>$group->id)),
        array('label'=>'小组头像','url'=>array('uploadFace','id'=>$group->id)),
        
        array('label'=>'成员管理'),
        array('label'=>'成员管理','url'=>array('members','id'=>$group->id)),
        array('label'=>'成员称号','url'=>array('title', 'id'=>$group->id)),
    ),
));?>
</div>
