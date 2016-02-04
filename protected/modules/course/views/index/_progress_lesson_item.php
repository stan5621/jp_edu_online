<?php
$learn = LessonLearn::model()->findByAttributes(array('lessonId'=>$data->id,'userId'=>$user->id));
?>
<div style="color:#666">
<?php if($data->mediaType!="quiz"):?>
<div>
	<div class="lead light-green" style="margin-bottom:10px;">
		<a href="<?php echo Yii::app()->createUrl('course/lesson/view',array('id'=>$data->id))?>" class='light-green' >	
		<span class="pull-left">课时&nbsp;<?php echo $data->number;?>&nbsp;&nbsp;&nbsp;</span>	
	<?php echo $data->title;?>	
		</a>
	</div>
		<?php if($learn):?>
		<div>
			<p>
				开始 : <?php  echo date('Y-m-d H:i',$learn->startTime);?>&nbsp;&nbsp;
				<?php if($learn->finishTime>0){ ?>完成：<?php echo date('Y-m-d H:i',$learn->finishTime); }?>
			</p>
		</div>
	<?php else:?>
		<p >尚未开始学习</p>
	<?php endif;?>
</div>
<?php else:?>
<?php  $report = $data->quiz->userReport($user->id);?>
<div>
	<div class="lead light-green" style="margin-bottom:10px;">
		<a href="<?php echo Yii::app()->createUrl('course/lesson/view',array('id'=>$data->id))?>" class='light-green' >	
		<span class="pull-left">课时&nbsp;<?php echo $data->number;?>&nbsp;&nbsp;&nbsp;</span>	
	<?php echo $data->title;?>	
		</a>
	</div>
	<?php if($learn):?>
		<div>
			<?php  if($report): ?>
			<p class="">
				<span class="">得分:
				<?php echo $report->score;?>
				</span>
				&nbsp;&nbsp;&nbsp;
				<span class="">正确:
				<?php echo $report->correctNum;?>
				</span>
				&nbsp;&nbsp;&nbsp;<span class="">部分正确:
				<?php echo $report->partialCorrectNum;?>
				</span>
				&nbsp;&nbsp;&nbsp;<span class="">错误:
				<?php echo $report->wrongNum;?>
				</span>
			</p>
			<?php endif;?>
			<p>
				开始 : <?php  echo date('Y-m-d H:i',$learn->startTime);?>&nbsp;&nbsp;
				<?php if($learn->finishTime>0){ ?>完成：<?php echo date('Y-m-d H:i',$learn->finishTime); }?>
			</p>
		</div>
	<?php else:?>
		<p >尚未开始学习</p>
	<?php endif;?>

</div>
<?php endif;?>
	<br/>
	</div>


