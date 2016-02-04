<?php
/* @var $this ArticleController */
/* @var $data Article */
?>

<div class="new-item">
    <div class="data">
        <div class="pull-left hidden-phone">
        	<?php $img = CHtml::image($data->face);?>
        	<?php echo CHtml::link($img,array('article/view', 'id'=>$data->id));?>
        </div>
        
        <div class="margin-left:200px">
            <div class="title"><a href="<?php echo CHtml::normalizeUrl(array('article/view', 'id'=>$data->id)); ?>"><?php echo $data->title; ?></a></div>
            <div class="content"><?php echo mb_substr(strip_tags($data->content), 0, 140, 'utf-8'); ?> ...</div>
            <div class="info">
                <span><?php echo date('Y-m-d', $data->upTime); ?></span>
                <span><i class="icon-eye-open"></i>&nbsp;&nbsp;<?php echo $data->viewNum; ?></span>
                 <span><i class="icon-comment"></i>&nbsp;&nbsp;<?php echo $data->commentNum; ?></span>
                <span><?php echo CHtml::link('查看', array('view', 'id'=>$data->id)); ?></span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
