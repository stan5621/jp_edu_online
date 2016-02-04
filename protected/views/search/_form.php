<br/>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		    'id'=>'searchForm',
		    'type'=>'search',
			'method'=>'get',
			'action'=>array('//search'),
		    'htmlOptions'=>array(),
)); ?>

    <input type="hidden" name="type" value="<?php echo $_GET['type']; ?>" />
    <input type="text" name="keyword" class="span6 input-large search-query " placeHolder="搜索" value="<?php echo $keyword;?>" />
    <button class="btn btn-default" type="submit"><i class="icon-search"></i>搜索</button>

<?php $this->endWidget(); ?>

<?php if(!$keyword):?>
	<h5>请输入关键词</h5>
<?php endif;?>
	
	
