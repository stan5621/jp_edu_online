<?php
/* @var $this UserController */
/* @var $model UserInfo */

?>

<h2>重新设置密码</h2>
<hr/>
<div class="row">
	<div class="span4 center" style="margin-top:20px;">
		<?php if($result):?>
			<div>设置成功！&nbsp;&nbsp;
						<?php echo CHtml::link('去登录',array('u/login'));?>
			</div>
		<?php else:?>
			<div>抱歉，设置失败...&nbsp;&nbsp;
			<?php echo CHtml::link('再试一次',array('u/forgetPassword'));?>
			</div>
		<?php endif;?>
	</div>
</div>

