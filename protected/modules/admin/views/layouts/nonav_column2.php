<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/nonav_main'); ?>
<div class="container">
<div class="row">
	<div class="span2">
		<div style="border-right:1px solid #ddd;padding-bottom:200px;">
		<?php $this->renderPartial("/default/_sidenav");?>
		</div>
	</div>
	<div class="span10">
		<div id="content" >
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
</div>
<?php $this->endContent(); ?>
