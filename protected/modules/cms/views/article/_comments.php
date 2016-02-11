<!-- 评论列表 -->
<div>
    <?php 
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider'=>$model->getCommentDataProvider(array('pagination'=>array('pageSize'=>40))),
        'itemView'=>'_comment_item',
        'viewData'=>array('model'=>$model),
        'summaryText'=>'{count} 回复',
        'emptyText'=>false,
    )); ?>
</div>


<!-- 发布评论 -->
<div >
    <?php $comment = new Comment;?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'post-comment-form',
        'action'=>array('addComment','id'=>$model->id),
        'clientOptions'=>array('validateOnSubmit'=>true,),
    )); ?>
    <?php echo $form->errorSummary($comment); ?>
    
    <?php if(!Yii::app()->user->isGuest){?>
        <!-- 已登录可发布评论 -->
        <div class="row" >
            <div style="margin-left:40px;">
            <h4>我的回复：</h4>
            <?php  $this->widget('ext.kindeditor.KindEditor', array(
                    'model'=>$comment,
                    'attribute'=>'content',
            )); ?>
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
    <?php }else{ ?>
        <!-- 先登陆再发布评论 -->
        <?php Yii::app()->user->returnUrl=Yii::app()->request->getUrl(); ?>
        <div class="row" >
            <div style="margin-left:30px;">
            <h4>我的回复：</h4>
            <p>回复前请先<?php echo CHtml::link(' 登录 ',array('u/login'))?>或<?php echo CHtml::link(' 注册 ',array('u/register'));?></p>
            </div>
        </div>
    <?php }?>
    <?php $this->endWidget(); ?>
</div>
