<div style="margin-top: 40px">

<?php
	$upgradelabel = '系统更新 ';

	$upgradeCount = UpgradeInfo::model()->count("status=:status",array(':status'=>'not installed'));

	if ($upgradeCount>0) {
		$upgradelabel .= $this->widget('bootstrap.widgets.TbBadge',array(
										'type'=>'warning',
										'label'=>$upgradeCount,
									),true);
	}

	$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
	'encodeLabel'=>false,
    'items'=>array(
				   array('label'=>'系统设置'),
				   array('label'=>'网站设置','icon'=>'wrench','url'=>array('setting/site'), 'active'=>$this->id==='setting' and $this->action->id==='site'),
				   array('label'=>$upgradelabel,'icon'=>'download','url'=>array('upgradeClient/index'), 'active'=>$this->id==='upgradeClient'),
				   array('label'=>'邮箱设置','icon'=>'envelope','url'=>array('setting/mailer'), 'active'=>$this->id==='setting' and $this->action->id==='mailer'),
				   array('label'=>'支付设置','icon'=>'shopping-cart','url'=>array('setting/payment'), 'active'=>$this->id==='setting' and $this->action->id==='payment'),
				   array('label'=>'主题设置','icon'=>'picture','url'=>array('setting/theme'), 'active'=>$this->id==='setting' and $this->action->id==='theme'),
				   array('label'=>'用户管理'),
				   array('label'=>'用户管理','icon'=>'user','url'=>array('user/admin'), 'active'=>$this->id==='user'),
//				   array('label'=>'开放登录','icon'=>'th','url'=>array('setting/openAuth')),
				   ),
	));
?>
</div>
