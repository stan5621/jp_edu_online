		<h3 ><?php echo $post->title;?></h3>
		<hr style="margin: 10px 0 20px 0"/>
		<table style="width:100%">
			<tr>
				<td style="width:60px;vertical-align:top;">
									<?php $img = CHtml::image(Yii::app()->baseUrl."/".DxdUtil::xImage($post->user->face, 50, 50),"images",array('style'=>'width:50px;height:50px;'));
						echo CHtml::link($img,$post->user->name,array('class'=>' dxd-username','data-userId'=>$post->user->id));
					?>
							<?php //echo CHtml::ajaxLink(' ',array('vote/post','id'=>$post->id,'value'=>1),array('success'=>'js:function(data){$(".dxd-post-up").addClass("dxd-voted");$(".dxd-post-vote-result").html(data);}'),array('class'=>'dxd-post-up '.($post->voteUpNum ? "dxd-voted" : "")));?>
							<?php //echo CHtml::ajaxLink(' ',array('vote/post','id'=>$post->id,'value'=>0),array('success'=>'js:function(data){$(".dxd-post-vote-result").html(data);}'),array('class'=>'dxd-post-down '));?>
				</td>
				<td>
					<?php echo CHtml::ajaxLink(' ',array('post/toggleVote','id'=>$post->id,'value'=>1),array('success'=>'js:function(data){$(".dxd-post-up").addClass("dxd-voted");$(".dxd-post-vote-result").html(data);}'),array('class'=>'pull-right dxd-post-up '.($post->voteUpNum ? "dxd-voted" : "")));?>
				
					<div style="margin-bottom:5px;"><?php echo CHtml::link($post->user->name,$post->user->pageUrl,array('class'=>'dxd-username','data-userId'=>$post->user->id));?><span class="muted">&nbsp;&nbsp;<?php echo date("Y-m-d H:i",$post->addTime);?></span>
					<?php //$img = CHtml::image(Yii::app()->baseUrl."/".DxdUtil::xImage($post->user->face, 25, 25),"images",array('style'=>'width:25px;height:25px;'));
						//echo CHtml::link($img,$post->user->name,array('class'=>'pull-right dxd-username','data-userId'=>$post->user->id));
					?>
					<div class="muted dxd-post-vote-result pull-right" style="font-size:0.8em;padding-right:5px;"><?php if($post->voteUpNum || $post->voteDownNum) $this->renderPartial('//vote/result',array('score'=>$post->voteUpNum-$post->voteDownNum,'voteUpers'=>$post->getVoteUperDataProvider()->getData()));?></div>
					<div class="clearfix"></div>
					</div>
					<div class="dxd-post-content" style="margin-bottom:30px;">
						<?php echo $post->content;?>
					</div>
					<?php  $this->widget('ext.jiathis.JiaThis');?>					
				<?php if(Yii::app()->user->checkAccess('postAuthor',array('post'=>$post))):?>
					<div style="text-align:right" class="muted">
						<?php echo CHtml::link('编辑',array('post/update','id'=>$post->id),array('class'=>'muted'));?>&nbsp;|&nbsp;
						<?php echo CHtml::link('删除',array('post/delete','id'=>$post->id),array('class'=>'muted'));?>
					</div>
				<?php endif;?>
				</td>
			</tr>
		</table>
		<div>

		</div>
		
		<div>
		
		<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>


	<div style="margin-top:50px;">
	<?php 
	$this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$post->getCommentDataProvider(array('pagination'=>array('pageSize'=>40))),
	'itemView'=>'/post/_comment',
	'viewData'=>array('post'=>$post),
	'summaryText'=>'{count} 回复',
	'emptyText'=>false,
)); ?>
	</div>
<div >
<?php $comment = new Comment;?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-comment-form',
	'action'=>array('post/addComment','id'=>$post->id),
//	'enableAjaxValidation'=>isset($ajax)?true:false,
//	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,),
)); ?>

	<?php echo $form->errorSummary($comment); ?>
	<?php if(!Yii::app()->user->isGuest){?>
	<div class="row" >
	<div style="margin-left:40px;">
		<h4>我的回复：</h4>

		<?php echo $form->textArea($comment,'content',array('rows'=>7,'style'=>'width:100%','class'=>'dxd-kind-editor')); ?>

		<?php echo $form->error($comment,'content'); ?>
		</div>
	</div>
<br/>
	<div class="row" style="maring-top:60px;">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
    'type'=>'success',
    'label'=>$comment->isNewRecord ? '发布' : '保存',
    'buttonType'=>'submit',
	'htmlOptions'=>array('class'=>'pull-right')
    )); ?>
	</div>
<?php }else{
Yii::app()->user->returnUrl=Yii::app()->request->getUrl();;	
	
	?>
	<div class="row" >
	<div style="margin-left:30px;">
	<h4>我的回复：</h4>
		<p>回复前请先<?php echo CHtml::link(' 登录 ',array('u/login'))?>或<?php echo CHtml::link(' 注册 ',array('u/register'));?></p>
	</div>
	</div>
<?php }?>
<?php $this->endWidget(); ?>

</div><!-- form -->
		
		
		</div>
