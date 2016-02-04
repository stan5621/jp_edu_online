<h3 ><?php echo $post->title;?></h3>
<hr style="margin: 10px 0 20px 0; border-top:0; border-bottom:2px solid #ddd;"/>

<!-- 帖子内容 -->
<table style="width:100%">
    <tr>
        <!-- 头像 -->
        <td style="width:60px;vertical-align:top;">
            <?php
            $img = CHtml::image(Yii::app()->baseUrl."/".DxdUtil::xImage($post->user->face, 50, 50),"images",array('style'=>'width:50px;height:50px;'));
            echo CHtml::link($img,$post->user->name,array('class'=>'dxd-username','data-userId'=>$post->user->id));
            ?>
        </td>
        <!-- 内容 -->
        <td style="max-width:808px">
            <?php echo CHtml::ajaxLink(' ',array('post/toggleVote','id'=>$post->id,'value'=>1),array('success'=>'js:function(data){$(".dxd-post-up").addClass("dxd-voted");$(".dxd-post-vote-result").html(data);}'),array('class'=>'pull-right dxd-post-up '.($post->voteUpNum ? "dxd-voted" : "")));?>

            <div style="margin-bottom:5px;"><?php echo CHtml::link($post->user->name,$post->user->pageUrl,array('class'=>'dxd-username','data-userId'=>$post->user->id));?><span class="muted">&nbsp;&nbsp;<?php echo date("Y-m-d H:i",$post->addTime);?></span>
                <div class="muted dxd-post-vote-result pull-right" style="font-size:0.8em;padding-right:5px;"><?php if($post->voteUpNum || $post->voteDownNum) $this->renderPartial('//vote/result',array('score'=>$post->voteUpNum-$post->voteDownNum,'voteUpers'=>$post->getVoteUperDataProvider()->getData()));?></div>
                <div class="clearfix"></div>
            </div>

            <div class="dxd-post-content" style="margin-bottom:30px;">
                <?php echo $post->content;?>
            </div>
            <!-- 编辑帖子 -->
            <div style="text-align:right" class="muted">
                <?php if($member->inRoles(array('superAdmin','admin'))):?>
                    <?php echo CHtml::link(($post->isTop>0?'取消置顶':'置顶'),array('setTop','id'=>$group->id,'postId'=>$post->id,'value'=>($post->isTop>0?'0':'1')),array('class'=>'muted'));?>
                <?php endif;?>
                &nbsp;|&nbsp;
                <?php if(Yii::app()->user->checkAccess('updatePost',array('post'=>$post))){
                    echo CHtml::link('编辑',array('update','id'=>$post->id),array('class'=>'muted'));
                } ?>
                &nbsp;|&nbsp;
                <?php if(Yii::app()->user->checkAccess('deletePost',array('post'=>$post)) || $member->inRoles(array('superAdmin','admin'))):?>
                        <?php echo CHtml::link('删除',array('delete','id'=>$group->id,'postId'=>$post->id),array('class'=>'muted'));?>
                <?php endif;?>
            </div>
        </td>
    </tr>
</table>

<!-- 回复内容 -->
<div class="reply-content">
    <div style="margin-top:50px;">
        <?php
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$post->getCommentDataProvider(array('pagination'=>array('pageSize'=>40))),
            'itemView'=>'_comment_item',
            'viewData'=>array('post'=>$post,'member'=>$member,'group'=>$group),
            'summaryText'=>'{count} 回复',
            'emptyText'=>false,
        )); ?>
    </div>
    <hr>
<div >

<?php $comment = new Comment;?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'post-comment-form',
    'action'=>array('post/addComment','id'=>$post->id),
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
        <p>回复前请先<?php echo CHtml::link(' 登录 ',array('//u/login'))?>或<?php echo CHtml::link(' 注册 ',array('//u/register'));?></p>
    </div>
    </div>
<?php }?>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>


<?php  Yii::app()->clientScript->registerScript("viewNum",
    '$.get("'.$this->createUrl('post/counter',array('id'=>$post->id)).'");'
);?>

<style>
hr {
    border-top: 0;
}
</style>

