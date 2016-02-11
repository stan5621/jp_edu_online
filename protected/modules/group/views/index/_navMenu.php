<?php
$items = array(
    '0' => array('label'=>'最新话题', 'url'=>array('index/index'), 'active'=>$this->action->id==='index'),
    '1' => array('label'=>'我的小组', 'url'=>array('index/me'), 'active'=>$this->action->id==='me'),
    '2' => array('label'=>'全部小组', 'url'=>array('index/list'), 'active'=>$this->action->id==='list'),
);
// 如果用户未登录
if (Yii::app()->user->isGuest) unset($items[1]);
$this->widget(
    'bootstrap.widgets.TbMenu',
    array(
        'type'=>'pills',
        'stacked'=>false,
        'items'=>$items,
        'htmlOptions'=>array('class'=>'group-post-tabs menu'),
    )
); ?>
