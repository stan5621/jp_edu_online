<?php
$this->pageTitle = Yii::app()->name."-小组";
?>

<div id="edu-group" class="row">
    <!-- 小组帖子列表 -->
    <div class="span9 index-postlist">
        <!-- menu -->
        <?php echo $this->renderPartial('_navMenu'); ?>

        <!-- 所有小组 -->
        <div class="tab-pane" id="post-tab-group-all">
            <?php $this->widget(
                'bootstrap.widgets.TbListView',
                array(
                    'dataProvider'=>$allGroupDataProvider,
                    'template'=>"{items}{pager}",
                    'itemView'=>'_item_index_allGroup',
                    'emptyText'=>'暂时没有小组',
                    'htmlOptions'   =>  array('class'=>'row')
                )
            ); ?>
        </div>
    </div>

    <!-- Side: 热门小组 -->
    <div class="span3">
        <div class="side-hotgroup">
            <h3>热门小组</h3>
            <?php $this->widget(
                'bootstrap.widgets.TbListView',
                array(
                    'dataProvider'  =>  $hotGroupDataProvider,
                    'template'      =>  '{items}',
                    'itemView'      =>  '_item_index_hotGroup',
                    'separator'     =>  '<hr class="separator" style="margin:20px 0;">',
                    'emptyText'     =>  '暂时没有小组'
                )
            ); ?>
        </div>

    </div>
</div>

