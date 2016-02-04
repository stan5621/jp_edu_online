<?php
?>

<?php echo $score;?>人觉得有用，来自：
<?php foreach($voteUpers as $user){?>
<?php echo CHtml::link($user->name,"#",array('class'=>'muted dxd-username','data-userId'=>$user->id));?>&nbsp;,
<?php }?>