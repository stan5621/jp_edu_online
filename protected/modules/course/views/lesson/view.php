<?php
/* @var $this LessonController */
/* @var $model Lesson */
$this->pageTitle = Yii::app()->name."-$lesson->title";

 $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
 	'homeLink'=>false,
    'links'=>array($lesson->course->name=>array('index/view','id'=>$lesson->course->id), $lesson->title),
)); 

?>
<h3><?php echo $lesson->title?></h3>

<div class="row">
<div class="span7">

		<?php $this->renderPartial("/lesson/_view",array("lesson"=>$lesson));?>
		
					<!-- 公共笔记开始 -->
	<div class="mt20">		
	<h4>简介</h4>
		<!-- 笔记内容-->
		<div class="dxd-lesson-note" style="font-size: 16px;line-height:1.75em;">
			<?php echo ($lesson->introduction)?$lesson->introduction:'笔记内容为空！' ?>
		</div>
		</div>
		
	</div>
	
		<div class="span5" >
		
		<div class="tabbable"> <!-- Only required for left/right tabs -->
		 <!-- 标签 -->
		  <ul class="nav nav-pills" style="margin-bottom:0">
		    <li class="<?php if(!($member && $member->inRoles(array('student','member','teacher')))) echo "active";?> pull-right"><a href="#tab0" data-toggle="tab">讨论</a></li>
		    <li class="<?php if($member && $member->inRoles(array('student','member','teacher'))) echo "active";?> pull-right"><a href="#tab1" data-toggle="tab">笔记</a></li>
		    
		    <li class="pull-right"><a href="#tab2" data-toggle="tab">资料</a></li>
		    
		    <li class="pull-right"><a href="#tab3" data-toggle="tab">目录</a></li>

		  </ul>
		  <!-- 内容 -->
		  <div class="tab-content" style="overflow:hidden">
		  <div class="tab-pane <?php if(!($member && $member->inRoles(array('student','member','teacher')))) echo "active";?>" id="tab0">
		  	<div style="margin-top:20px">
				<?php if(!Yii::app()->user->isGuest){?>
				<div><?php //echo CHtml::link('发布讨论',array('/course/post/create','lessonId'=>$lesson->id),array('target'=>'_blank','class'=>'btn'));?></div>
				
				<?php $this->renderPartial('/post/_form',array('lessonId'=>$lesson->id));?>
				<div class="clearfix"></div>
				<?php }else{
				Yii::app()->user->returnUrl=array('course/lesson/view','id'=>$lesson->id);	
				 ?>
				<p>评论前请先<?php echo CHtml::link(' 登录 ',array('//u/login'))?>或<?php echo CHtml::link(' 注册 ',array('//u/register'));?></p>
				<?php }?>
			<div class="dxd-lesson-comments">
			<?php 
				$this->renderPartial('/post/_items',array('dataProvider'=>$postDataProvider,'lessonId'=>$lesson->id));
			?>
			</div>
			</div> 
		  </div>
		    <!--  内容1 -->
		    <div class="tab-pane <?php if($member && $member->inRoles(array('student','member','teacher'))) echo "active";?>" id="tab1">
			<?php  echo $this->renderPartial('/lesson/_note',array('lesson'=>$lesson,'myNote'=>$myNote));?>		  
		    </div>
		    <!-- 内容1结束 -->
		    <!-- 内容2开始 -->
		    
		    <div class="tab-pane" id="tab2">
		      <div style=""> <?php // echo CHtml::link('<i class="icon-pencil"></i> 提问','javascript:;',array('class'=>'btn','data-toggle'=>'collapse','data-target'=>'#dxd-question-form-wrapper','id'=>'dxd-ask-question','style'=>'margin-bottom:10px;'));?></div>
		      <div class="clearfix"></div>
		      <div class="">
			  <?php
			 //	echo $this->renderPartial('_question_form', array('model'=> new Question(),'course'=>$lesson->course,'lesson'=>$lesson));
			  	 $this->widget('bootstrap.widgets.TbListView', array(
				    'dataProvider'=>new CArrayDataProvider($lesson->docs),
				    'itemView'=>'_doc_item',   // refers to the partial view named '_post'
  					'summaryText'=>false,
					'emptyText'=>'<div style="padding: 15px;">还没有文档资料</div>',
				));
			  ?>
			   </div>

		    </div>
		   
		    <!-- 内容2结束 -->		
  
  			<div class="tab-pane" id="tab3" style="max-height:450px;overflow:auto;">
  				<?php 	$this->widget('bootstrap.widgets.TbListView', array(
				    'dataProvider'=>$lessonDataProvider,
				    'itemView'=>'/index/_lesson',   // refers to the partial view named '_post'
					'viewData'=>array('pagination'=>$lessonDataProvider->pagination,'member'=>$member),
  					'summaryText'=>false,
					'emptyText'=>'<div style="padding: 15px;">课时列表为空</div>',
				));
				?>
  			</div>
		  </div>
		</div>
		</div>
	</div>



<script type="text/javascript">
$(document).ready(function(){

	//显示或隐藏修改理由输入框
	$('.dxd-lesson-note-reason select').change(function(){
		if($(this).val()=="0"){
			block.find('.dxd-lesson-note-other-reason').show();
		}else{
			block.find('.dxd-lesson-note-other-reason').hide();
		}
	});
	//是否公开个人笔记
	$('#dxd-lesson-note-toggle-published').click(function(){
		var dis=this;
		var url = $(dis).attr('href');
		$.get(url,function(data){
				if(data==true)
					$(dis).text('设为私密');
				else if(data==false)
					$(dis).text('设为公开');
		});
		return false;
	});
	//为个人笔记投票
	$('.dxd-lesson-note-vote').click(function(){
		var dis=this;
		var url = $(dis).attr('href');
		$.get(url,function(data){
			$(dis).parents('.dxd-public-lesson-note').find('.dxd-lesson-note-vote-result').html(data);
			$(dis).addClass('dxd-voted');
		});
		return false;
	});

	//如果是一个登录用户打开这个页面，需要轮询确保自己在登录状态，否则给出警告，跳转到首页 add by lsy 20140827
	if('<?php echo ''.Yii::app()->user->isGuest;?>' != '1') {
		var timer = setInterval(function(){checkLogin();},120000);
	}
	function checkLogin(){
		$.ajax({
			url:'<?php echo Yii::app()->createAbsoluteUrl('me/checklogin');?>',
			success:function(data){
				dataObj = JSON.parse(data);
				//$('.uploadify').uploadify('settings','uploader',dataObj.url);
				if(dataObj.isGuest){
					//显示提醒
					$("#openLogoutAlarm").trigger('click');
					//清除定时器
					clearInterval(timer);
					//5秒后跳转到首页
					setTimeout(function(){window.location.href='<?php echo Yii::app()->homeUrl;?>';},5000);
					
				}
				
				
			}
		});
	}
	$("#openLogoutAlarm").fancybox({
		onClosed: function(){
			window.location.href='<?php echo Yii::app()->homeUrl;?>';
		}
	});
	//轮询确保自己在登录状态，否则给出警告，跳转到首页 add by lsy 20140827
	
	//hover切换tab
//	$('.dxd-right-col .nav-tabs > li > a').hover( function(){
//	      $(this).tab('show');
//	   });
});

</script>
<!-- 轮询确保自己在登录状态，否则给出警告，跳转到首页 add by lsy 20140827 -->
<button href="#LogoutAlarm" id="openLogoutAlarm" style="display:none"></button>
<div style="display:none">
<div id="LogoutAlarm">
	<p>您的帐号已经在别处登录。5秒后将下线。</p>
	<p>如果这不是您本人的操作，请与网站管理员联系。</p>
</div>
</div>
<!-- 轮询确保自己在登录状态，否则给出警告，跳转到首页 add by lsy 20140827 -->
<?php  Yii::app()->clientScript->registerScript("viewNum",
												'$.get("'.$this->createUrl('counter',array('id'=>$lesson->id)).'");'
												);?>
				

							
