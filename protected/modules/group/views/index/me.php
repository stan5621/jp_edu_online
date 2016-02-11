<?php
$this->pageTitle = Yii::app()->name."-小组";
?>

<div id="edu-group" class="row">
    <!-- 小组帖子列表 -->
    <div class="span9 index-postlist">
        <!-- menu -->
        <?php echo $this->renderPartial('_navMenu'); ?>

        <!-- 我的小组帖子 -->
        <div class="tab-pane" id="post-tab-group-me">
            <?php $this->widget(
                'bootstrap.widgets.TbListView',
                array(
                    'dataProvider'=>$newPostDataProvider,
                    'template'=>"{items}{pager}",
                    'itemView'=>'_item_index_post',
                    'separator'     =>  '<hr class="separator" style="margin:25px 0;">',
                    'emptyText'=>'暂时没有小组帖子数据'
                )
            ); ?>
        </div>
    </div>

    <!-- Side: 我的小组 -->
    <div class="span3">
        <div class="side-mygroup">
            <h3>我的小组</h3>
            <?php $this->widget(
                'bootstrap.widgets.TbListView',
                array(
                    'dataProvider'  =>  $myGroupDataProvider,
                    'template'      =>  '{items}',
                    'itemView'      =>  '_item_index_myGroup',
                    'emptyText'     =>  '暂时没有小组',
                    'htmlOptions'    =>  array('class'=>'row'),
                )
            ); ?>
        </div>

        <!-- 创建小组按钮 -->
        <div class="" >
            <?php echo CHtml::link('+&nbsp;申请创建小组',array('create'),array('class'=>'create-group-bar text-center'));?>
        </div>
    </div>
</div>

