<div style="margin-top: 40px;border-right:1px solid #ccc;">
    <br/>
    <?php $this->widget(
        'bootstrap.widgets.TbMenu',
        array(
            'type'=>'list',
            'items'=>array(
                //	array('label'=>'结果分类'),
                array('label'=>"全部结果", 'url'=>array('//search/index','type'=>'all','keyword'=>$keyword), 'active'=>$_GET['type']==='all' ? true : false),
                array('label'=>'课程', 'url'=>array('//search/index','type'=>'course','keyword'=>$keyword), 'active'=>$_GET['type']==='course' ? true : false),
                array('label'=>'讨论', 'url'=>array('//search/index','type'=>'post','keyword'=>$keyword), 'active'=>$_GET['type']==='post' ? true : false),
                array('label'=>'用户', 'url'=>array('//search/index','type'=>'user','keyword'=>$keyword), 'active'=>$_GET['type']==='user' ? true : false),
                array('label'=>'小组', 'url'=>array('//search/index','type'=>'group','keyword'=>$keyword), 'active'=>$_GET['type']==='group' ? true : false),
                array('label'=>'新闻', 'url'=>array('//search/index','type'=>'article','keyword'=>$keyword), 'active'=>$_GET['type']==='article' ? true : false),
            ),
        )
    ); ?>
    <br/>
</div>
