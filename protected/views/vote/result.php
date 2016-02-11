<?php
?>

<?php echo $score;?>票，来自：

<?php 
foreach($voteUpers as $voter){?>
<?php echo CHtml::link($voter->name,"#",array('class'=>'muted dxd-username','data-userId'=>$voter->id));?>&nbsp;,
<?php }?>