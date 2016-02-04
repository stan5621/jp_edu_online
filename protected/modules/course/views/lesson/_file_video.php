<?php
/* @var $this LessonController */
/* @var $data Lesson */
?>




<div class="dxd-player">
	<div class="visible-desktop">
    <?php 
			$file = $lesson->file;
           if ($file && $file->storage == "local"){
            	$src = Yii::app()->baseUrl."/".$lesson->file->path;
   		 	 $this->widget('ext.videojs.MVideoJsPlayer',array('flashvars'=>array('src'=>$src)));
            	
           }
            elseif ($file && $file->storage == "cloud"){
            	$src= CloudService::getInstance()->getDownloadUrl($file->convertStatus=="success" ? $file->convertKey : $file->path);
   				 $this->widget('ext.grindplayer.MGrindPlayer',array('flashvars'=>array('src'=>$src)));
    }?>
    </div>

  </div> 
  
  <script type="text/javascript">

$('.dxd-player').on('contextmenu', function(e) {e.preventDefault();});
</script>
<div class="clearfix"></div>