<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->bootstrap->register(); ?>
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome.min.css">
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.iframe-auto-height.plugin.min.js"></script>

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/style.min.css">
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/function.js"></script>
    <?php if(Yii::app()->theme) : ?>
        <?php if(is_file(Yii::app()->theme->basePath . '/css/style.min.css')) : ?>
            <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.min.css">
        <?php endif; ?>
        <?php if(is_file(Yii::app()->theme->basePath . '/js/function.js')) : ?>
            <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/function.js"></script>
        <?php endif; ?>
    <?php endif; ?>
</head>

<body>
<div class="head-bar">
    <div class="container ">
        <div class="" style="padding-top:26px">
            <form class="pull-right hidden-phone search-form" style="margin-bottom:0px;padding-top:5px;" method="get" action="<?php echo Yii::app()->createUrl('//search/index');?>">
                <div class="input-append">
                    <input type="hidden" name="r" value="search/index" />
                    <input type="hidden" name="type" value="all" />
                    <input type="text" name="keyword" class="span3" placeholder="搜索">
                    <button class="btn" type="submit" ><i class="icon-search icon-white"></i></button>
                </div>
            </form>
        </div>
        <div class="site_name" style="font-size:30px;margin-left:-9px;">
            <a style="color:#444444" href="http://bagexuetang.com">八哥课堂</a>
        </div>
<!--        <div class="logo" style="margin-left:-69px;"> -->

        <?php
//            global $sysSettings;
//            if(isset($sysSettings['site']['logo'])):
//                $img=CHtml::image(Yii::app()->baseUrl."/".$sysSettings['site']['logo'],"",array('style'=>'height:90px;margin-top:-26px;'));
//                echo CHtml::link($img,Yii::app()->baseUrl."/");
//            endif;
        ?>
<!--        </div> -->
    </div>
</div>
<div class="clearfix"></div>

<?php
$noticeLabel = "提醒";
$messageLabel = "私信";
if(!Yii::app()->user->isGuest){
    $me = UserInfo::model()->with('unisCheckedMessageCount','unisCheckedNoticeCount')->findByPk(Yii::app()->user->id);
    if(!empty($me) && $me->unisCheckedNoticeCount>0 && !(Yii::app()->controller->id=="notice") ){
        $noticeLabel.=  '&nbsp;<span class="badge badge-warning">'.$me->unisCheckedNoticeCount.'</span>';
    }
    $noticeLabel = '<span class="dxd-notice">'.$noticeLabel.'</span>';
    if(!empty($me) && $me->unisCheckedMessageCount>0 && !(Yii::app()->controller->id=="message"))
        $messageLabel.=  '&nbsp;<span class="badge badge-warning">'.$me->unisCheckedMessageCount.'</span>';
}else{

}
$items=Nav::getTopItems();
//$items = array_merge($items,NavPage::getPageItems());
?>

<!-- Main-nav -->
<div class="main-nav">
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    // 'brand'=>Yii::app()->params['settings']['site']['name']."<sup style=\"font-size:0.6em\"> ".Yii::app()->params['settings']['site']['subTitle']."</sup>",
    // 'brandUrl'=>Yii::app()->baseUrl,
    // 'collapse'=>true, // requires bootstrap-responsive.css
    'brand'=>false,
    'fixed'=>false,
    'htmlOptions'=>array('style'=>'margin-bottom:0;'),
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'encodeLabel'=>false,
            'items'=>$items,
            'htmlOptions'=>array('class'=>'hidden-phone dxd-navbar-left-items'),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right hidden-phone dxd-navbar-right-items'),
            'items'=>array(
                array(
                    'url'=>array('//notice/index'),
                    'visible'=>!Yii::app()->user->isGuest,
                    'label'=>$noticeLabel,
                    'active'=>$this->activeMenu=='notice',
                    'class'=>'dxd-notice-link',
                    'htmlOptions'=>array('class'=>'dxd-notice-link'),
                ),
                array(
                    'url'=>array('//message/index'),
                    'visible'=>!Yii::app()->user->isGuest,
                    'label'=>$messageLabel,
                    'active'=>$this->activeMenu=='message',
                ),
                array(
                    'label'=>(isset(Yii::app()->user->displayName)?Yii::app()->user->displayName:""),
                    'url'=>'#',
                    'visible'=>!Yii::app()->user->isGuest,
                    'items'=>array(
                         array('label'=>'我的课程', 'url'=>array('//course/me'),'active'=>false),
                        array('label'=>'设置', 'url'=>array('//me/setBasic')),
                        '---',
                        array('label'=>'退出', 'url'=>array('//u/logout')),
                    )
                ),
                array(
                    'label'=>'后台管理',
                    'url'=>(Yii::app()->user->checkAccess('admin') ? array('//admin'):""),
                    'visible'=>Yii::app()->user->checkAccess('admin'),
                    'visible'=>Yii::app()->user->checkAccess('admin')
                ),
                array('label'=>'注册','url'=>array('//u/register'),'visible'=>Yii::app()->user->isGuest),
                array('label'=>'登陆','url'=>array('//u/login'),'visible'=>Yii::app()->user->isGuest),
            ),
            'encodeLabel'=>false,
        ),
    ),
)); ?>
</div>

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
// 'type'=>'inverse', // null or 'inverse'
'brand'=>false,
// 'brandUrl'=>Yii::app()->baseUrl,
// 'collapse'=>true, // requires bootstrap-responsive.css
'htmlOptions'=>array('class'=>'visible-phone'),
'items'=>array(
array(
    'class'=>'bootstrap.widgets.TbMenu',
    'items'=>array(
        array('label'=>'课程', 'url'=>array('//course/index')),
        array('label'=>'小组', 'url'=>array('//group/index')),
        // array('label'=>'创建课程', 'url'=>array('course/create')),
        array(
            'url'=>array('//notice/index'),
            'visible'=>!Yii::app()->user->isGuest,
            'label'=>$noticeLabel,
            'active'=>$this->activeMenu=='notice',
                ),
                array(
                    'url'=>array('//message/index'),
                    'visible'=>!Yii::app()->user->isGuest,
                    'label'=>$messageLabel,
                    'active'=>$this->activeMenu=='message',
                ),
                array('label'=>isset(Yii::app()->user->name)?"我":"", 'url'=>'#','visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                    // array('label'=>'个人空间', 'url'=>array('//me/index'),'active'=>false),
                    array('label'=>'设置', 'url'=>array('//me/setBasic')),
                    '---',
                    array('label'=>'退出', 'url'=>array('//u/logout')),
                )),
                array('label'=>'注册','url'=>array('//u/register'),'visible'=>Yii::app()->user->isGuest),
                array('label'=>'登陆','url'=>array('//u/login'),'visible'=>Yii::app()->user->isGuest),
            ),
            'encodeLabel'=>false,
        ),
    ),
)); ?>

<!-- Flash Messages -->
<?php $this->renderPartial('//layouts/_flash_messages');?>

<!-- Category 全部课程分类 -->
<?php if(Yii::app()->controller->id=="site" && Yii::app()->controller->action->id=="index"):?>
    <div class="hidden-phone main-carousel">
        <?php
        $carousels = Carousel::model()->findAll(array('order'=>'weight asc'));
        $carourseItems = array();
        foreach($carousels as $carousel){
            $item = array();
            $item['image'] = Yii::app()->baseUrl."/".$carousel->path;
            $item['imageOptions'] =array('style'=>"width:100%;");
            if($carousel->url) $item['url'] = $carousel->url;
            if($carousel->course) {
                $item['label'] = CHtml::link($carousel->course->name,$carousel->course->pageUrl);
                $item['url'] =$carousel->course->pageUrl;
                // $item['caption'] = mb_substr(strip_tags($carousel->course->introduction), 0,120)."...";
                // $item['captionOptions']['class'] = "container";
            }
            $carourseItems[] = $item;
        }
        $this->widget('bootstrap.widgets.TbCarousel', array(
            'items'=>$carourseItems,
            'displayPrevAndNext'=>true,
            'prevLabel'=>false,
            'nextLabel'=>false,
        ));
        ?>
    </div>
    <div class="course-category">
        <div class="container">
            <div class="course-category-inner">
                <div style="margin-bottom:35px">
                    <div style="font-size:2em" class="pull-left"> 全部课程分类 </div>
                    <?php echo CHtml::link('查看全部 》',array('/course/index'),array('class'=>'theme-color pull-right' ))?>
                    <div class="clearfix"></div>
                </div>
                <div class="course-category-list">
                    <?php $categorys = Course::model()->getCategorys(array('condition'=>'parentId=0 and type="course"'));?>
                    <?php
                    foreach($categorys as $category):
                    echo CHtml::link($category->name,array('/course/index','categoryId'=>$category->id),array('class'=>'category-btn btn'));
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>


<!-- Content 主要内容 -->
<?php echo $content; ?>


<!-- Footer 底部 -->
<div class="clearfix"></div>
<div class="light-green-background">
    <div class="container">
        <div class="row">
                    <?php
                        $footer = SystemSetting::model()->find('name="footer"');
                        if (isset($footer->value)) {
                            $footer = json_decode($footer->value, true);
                            echo $footer['html'];
                        }
                    ?>
        </div>
    </div>
</div>

<div class="green-background">
    <div class="container">
        <div class="row">
            <div class="span11 offset1">
                <div style="padding:15px 0;color:#444444;">
                    Powered by
                    <strong>
                        <?php if(isset($sysSettings['site']['poweredBy'])){
                            echo CHtml::link($sysSettings['site']['poweredBy'],$sysSettings['site']['poweredByUrl'],array('style'=>'color:#444444;'));
                        }else{
                            echo CHtml::link("八哥课堂","http://caomeikt.com",array('style'=>'color:#444444;'));
                        } ?>
                    </strong>
                    &nbsp;&nbsp;<?php echo Yii::app()->params['settings']['site']['icp'];?>
                    &nbsp;&nbsp;&nbsp; Copyright &copy; <?php echo "2015-".date('Y'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->widget('ext.hoverCard.HoverCard',array('target'=>'.dxd-username,.dxd-userface','config'=>array('url'=>Yii::app()->createUrl('u/hovercard'))));?>
<?php if(!Yii::app()->user->isGuest) $this->widget('ext.hoverCard.HoverCard',array('target'=>'.dxd-notice','config'=>array('url'=>Yii::app()->createUrl('notice/hovercard'))));?>

<!-- 模态框 -->
<?php $this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.dxd-fancy-elem',
    'config'=>array(
        'type'=>'iframe',
        'hideOnOverlayClick'=>false,
        'fitToView'   => false,
        'autoSize'    => true,
        'closeClick'  => false,
        'openEffect'  => 'none',
        'closeEffect' => 'none',
        'onClosed'=>'js:function(){window.location.reload();}'
    ),
)); ?>

<?php $this->widget('ext.kindeditor.KindEditor', array()); ?>

<?php
/*
Yii::import('ext.ewebbrowser.EWebBrowser');
$browser = new EWebBrowser();
if($browser->browser==EWebBrowser::BROWSER_IE && $browser->version<9 ){
$this->widget('application.extensions.pnotify.PNotify',array(
'options'=>array(
'title'=>'你正在使用不支持的浏览器！',
'text'=>'可能无法正常使用本站，我们建议您使用最新的Chrome，Firefox，Safari或IE9，IE10等浏览器',
'type'=>'error',
'width'=>'100%;',
'closer'=>false,
'hide'=>false))
);
}
*/
?>
<?php if(isset(Yii::app()->params['settings']['site']['analytic'])) echo Yii::app()->params['settings']['site']['analytic']; ?>

    <!-- 全站js脚本 -->
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/script.js"></script>
</body>
</html>
