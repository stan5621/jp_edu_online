<?php 
$vote = Vote::model()->findByPk($data['voteId']);
$post = null;
if($vote) $post = Post::model()->findByAttributes(array('entityId'=>$vote->voteableEntityId));
if(empty($post)) return false;
?>

<?php echo CHtml::link($vote->user->name,$vote->user->pageUrl);?> 
向<?php if($post->userId==Yii::app()->user->id) {echo "你的帖子";} else{echo "你关注的帖子";} ?> 
<?php echo CHtml::link($post->title,array('post/view','id'=>$post->id));?>投了
<?php if($vote->value>0): ?><span style="color:greed">赞成票</span><?php else:?><span style="color:red">反对票</span><?php endif;?>
