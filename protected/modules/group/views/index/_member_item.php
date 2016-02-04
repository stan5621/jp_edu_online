<?php if(!$data->user) return false; ?>

<div class="student-card">
    <?php
        echo CHtml::image($data->user->xFace, $data->user->name, array('class'=>'pull-left avatar'));
    ?>
    <div class="info">
        <p class="name">
            <?php echo CHtml::link($data->user->name, $data->user->pageUrl); ?>
        </p>
        <p class="de"><?php echo $data->user->bio; ?></p>
        <div class="action">
        <?php
            $user = $data->user;

            // 私信按钮
            echo Chtml::link('私信', array('/message/create', 'toUserId'=>$user->id), array('onclick'=>'openFancyBox(this);return false;'));
            
            // 关注按钮
            $isFan = $user->isFan(Yii::app()->user->id);
            $follow = $isFan ? '取消关注' : '关注';
            $btnClass = 'dxd-user-followed' . $user->id . ' ' . ($isFan ? '':'follow');
            echo CHtml::link($follow, array('/u/toggleFollow', 'id'=>$user->id), array('onclick'=>'toggleFollow(this);return false;', 'id'=>'dxd-user-followed-'.$user->id, 'class'=>$btnClass));
        ?>
        </div>
    </div>
</div>
