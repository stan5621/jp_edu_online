<?php 
$commentId = $data['commentId'];
$comment = Comment::model()->findByPk($commentId);
$post = Post::model()->findByAttributes(array('entityId'=>$comment->commentableEntityId));
if(!$comment || !$post) return false;
?>

<?php echo CHtml::link($comment->user->name,$comment->user->pageUrl);?> 
回复了<?php if($post->userId==Yii::app()->user->id) {echo "你的帖子";} else{echo "你关注的帖子";} ?> 
<?php echo CHtml::link($post->title, array('/group/post/view', 'id'=>$post->id)); ?>
