<?php
/* @var $this ArticleController */
/* @var $data Article */
?>

<div class="items-hot">
    <img class="pull-left" src="<?php echo $data->face; ?>" height="40" width="40">
    <p><?php echo CHtml::link(mb_substr($data->title, 0, 20, 'utf-8'), array('view', 'id'=>$data->id)); ?></p>
  <!--  
    <span> <?php echo date('Y-m-d', $data->upTime); ?> </span>
    <span> <?php echo $data->viewNum; ?>人阅读 </span>-->
    <div class="pull-right"><i class="icon-eye-open"></i>&nbsp;&nbsp;<?php echo $data->viewNum; ?></div>
    
    <div class="clearfix"></div>
</div>
