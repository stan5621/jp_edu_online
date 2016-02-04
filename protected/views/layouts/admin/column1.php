<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/admin/main'); ?>
<div style="overflow: hidden;
position: absolute;
z-index: 3;
top: 50px;
width: 100%;
bottom: 50px;">
	<?php  echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>
