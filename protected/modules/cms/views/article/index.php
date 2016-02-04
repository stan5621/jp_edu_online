<div class="container ew-news">

    <div class="row">
        <div class="span8">
            <div class="article-menu">
                <?php $this->renderPartial('_nav', array('categorys'=>$categorys)); ?>
            </div>
        
            <?php $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider'  =>  $dataProvider,
                'itemView'      =>  '_view',
                'template'      =>  '{items}{pager}',
                'pager' =>  array(
                    'class'         =>  'bootstrap.widgets.TbPager',
                    'header'        =>  '',
                    'nextPageLabel' =>  '下一页',
                    'prevPageLabel' =>  '上一页',
                    'maxButtonCount'=>  5,
                ),
                'separator'     =>  '<hr style="border-top:none; border-bottom:1px solid #ddd; margin:30px 0px;">',
            )); ?>
        </div>

         <div class="span4 side" style="margin-top: 20px;">
		<?php $this->renderPartial('_aside',array('hotArticleDataProvider'=>$hotArticleDataProvider));?>
		</div>
    </div>
</div>
