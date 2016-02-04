<?php
?>

<?php echo $voteNum;?>票，来自：
<?php foreach($voteUpers as $voter){?>
<?php echo CHtml::link($voter->username,"#",array('class'=>'muted'));?>&nbsp;,
<?php }?>