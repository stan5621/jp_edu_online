<h3 class="dxd-fancybox-header">系统更新进度</h3>
<div class="dxd-fancybox-body">
<div id="upgradeInfoBox">

</div>
</div>

<div class="dxd-fancybox-footer">
</div>

<script type="text/javascript">
$(document).ready(function(){
	var versions=[<?php echo $versions;?>];
	var bupgrade = false;
	$.ajax({
		url: "<?php echo $this->createAbsoluteUrl('upgradeClient/checkEnv');?>",
		async:false,
		context: $("#upgradeInfoBox"),
		dataType: 'json',
		success:function(data) {
			//$(this).append(data.html);
			(data.status == 'success')?bupgrade = true:bupgrade = false;	
			$(this).append(data.message);			
		}
	});
	if (bupgrade == true) {
		$.each(versions,function(key,val){
			//提示升级包版本号
			$("#upgradeInfoBox").append('<p>现在开始升级版本'+val+'</p>');
			//进行升级包下载
			if (bupgrade == true) {
				bupgrade = false;
				$.ajax({
					url: "<?php echo $this->createAbsoluteUrl('upgradeClient/downloadPackage');?>",
					type: 'POST',
					data:{version:val},
					async:false,
					context: $("#upgradeInfoBox"),
					dataType: 'json',
					success:function(data) {
						(data.status == 'success')?bupgrade = true:bupgrade = false;	
						$(this).append(data.message);
					}
				});
			}
			if (!bupgrade)
				return bupgrade;
			//解压升级包
			if (bupgrade == true) {
				bupgrade = false;
				$.ajax({
					url: "<?php echo $this->createAbsoluteUrl('upgradeClient/extractPackage');?>",
					type: 'POST',
					data:{version:val},
					async:false,
					context: $("#upgradeInfoBox"),
					dataType: 'json',
					success:function(data) {
						(data.status == 'success')?bupgrade = true:bupgrade = false;	
						$(this).append(data.message);
					}
				});
			}
			if (!bupgrade)
				return bupgrade;
			//更新包覆盖
			if (bupgrade == true) {
				bupgrade = false;
				$.ajax({
					url: "<?php echo $this->createAbsoluteUrl('upgradeClient/upgradeImplement');?>",
					type: 'POST',
					data:{version:val},
					async:false,
					context: $("#upgradeInfoBox"),
					dataType: 'json',
					success:function(data) {
						(data.status == 'success')?bupgrade = true:bupgrade = false;	
						$(this).append(data.message);
					}
				});
			}
			if (!bupgrade)
				return bupgrade;
		});
	}
	
});
</script>