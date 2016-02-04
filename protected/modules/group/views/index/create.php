<?php
/* @var $this GroupController */
/* @var $model Group */

?>

<h2>申请创建小组</h2>
<div class="row">
	<div class="span9">
	<!--  
		<?php // if($user->answerCount>=0):?>-->
			<em> 欢迎申请创建小组。</em>
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		<?php // endif?>
	</div>
	<div class="span3">
		
	</div>
</div>