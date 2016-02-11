<?php
/* @var $this CourseController */
/* @var $course Course */
$this->pageTitle = Yii::app()->name."-$group->name";
?>
<?php echo $this->renderPartial('_header', array('group'=>$group,'member'=>$member)); ?>

<div class="row dxd-course-body">
	<div class="span12 dxd-left-col">
	<?php
		$this->renderPartial('_member', array(
			'group'         =>  $group,
            'member'        =>  $member,
			'dataProvider'  =>  $dataProvider,
        ));
	?>
	</div>
</div>
