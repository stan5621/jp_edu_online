<?php
/* @var $this ArticleController */

Yii::app()->clientScript->registerMetaTag($model->keyWord, 'keyword');
Yii::app()->clientScript->registerMetaTag(mb_substr(strip_tags($model->content), 0, 100, 'utf-8'), 'description');

$category = Category::model()->findByPk($model->categoryId);
if($category){
	$this->breadcrumbs=array(
	    'links' =>  array(
	        '新闻'          =>  array('index'),
	        $category->name =>  array('index', 'cid'=>$model->categoryId),
	        $model->title,
	    ),
	    'homeLink'=>false,
	);	
}

?>

<div class="container ew-news">
    <div class="row">
        <div class="span12">
            <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', $this->breadcrumbs); ?>
        </div>
    </div>
    
    <div class="row">
        <!-- Article -->
        <div class="span8 news">
            <h2 class="text-center"><?php echo $model->title ?></h2>
            <div class="text-center info">
                <span> 发布时间: <?php echo date('Y-m-d', $model->addTime); ?> </span>
                <span> 阅读数: <?php echo $model->viewNum; ?> </span>
            </div>
            
            <hr>

            <div class="content">
            <?php echo $model->content; ?>
            </div>
            
            <!-- JiaThis 分享 -->
            <div style="margin-top: 1em;"></div>
            <?php $this->widget('ext.jiathis.JiaThis'); ?>	

            <!-- 评论 -->
            <div class="comment">
            <?php $this->renderPartial('_comments', array('model'=>$model)); ?>
            </div>
        </div>
       
        <!-- Side -->
         <div class="span4 side" style="margin-top: 20px;">
		<?php $this->renderPartial('_aside',array('hotArticleDataProvider'=>$hotArticleDataProvider));?>
		</div>
    </div>
</div>
