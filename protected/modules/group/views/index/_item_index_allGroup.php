<div class="item group-card span3" onClick="location.assign('<?php echo CHtml::normalizeUrl(array('//group/index/view', 'id'=>$data->id)); ?>')">
    <div class="pic pull-left">
        <?php
        $face = CHtml::image($data->xFace, $data->name,array('style'=>'background-color:white;'));
        echo CHtml::link($face, array('view', 'id'=>$data->id));
        ?>
    </div>
    <div class="data">
        <?php echo CHtml::link(mb_substr($data->name,0 ,7, 'utf-8'), array('view', 'id'=>$data->id), array('class'=>'name')); ?>
        <div><?php echo $data->memberNum .'位'. $data->memberTitle; ?>在此</div>
    </div>
</div>
