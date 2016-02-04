<div class="main-content group-courses">
    <div class="span10 center">
        <ul class="thumbnails">
            <?php
            $tab2 = $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_course_item',
                'summaryText'=>'共 {page} 页',
                'summaryCssClass'   =>  'pull-right page-jump',
                'pagerCssClass' =>  'pagination group-pagination',
                'template'=>'{items}',
                'emptyText'=>'还没有收藏课程',
                'pager' =>  array(
                    'class'         =>  'bootstrap.widgets.TbPager',
                    'header'        =>  '',
                    'nextPageLabel' =>  '下一页',
                    'prevPageLabel' =>  '上一页',
                    ),
            ));
            ?>
        </ul>
    </div>
</div>

<!-- 分页 -->
<?php 
    $tab2->renderPager();
?>
