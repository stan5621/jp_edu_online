<li class="group-course-card span3">
    <div class="div">
        <?php 
            if($data->face && DxdUtil::xImage($data->face,270,200)):
                $imgUrl = Yii::app()->baseUrl."/".DxdUtil::xImage($data->face,270,200);
            else:
                $imgUrl = "http://placehold.it/270x200";
            endif;
            $image = CHtml::image($data->xface, $data->name);
            echo CHtml::link($image, array('/course/index/view', 'id'=>$data->id));
        ?>
        <div class="info">
            <?php echo CHtml::link(mb_substr($data->name, 0, 32, 'utf-8'), array('/course/index/view', 'id'=>$data->id), array('style'=>'display:block;color:#333;font-size:22px;height:50px;border-bottom:2px solid #eee;padding:25px;line-height:30px;')); ?>
            <div style="padding:18px 25px">
                <div class="pull-left"> ￥<strong class="orange-color"><?php echo $data->fee ?></strong> </div>
                <div class="pull-right muted"> 已有 <?php echo $data->memberNum ?> 同学 </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</li>
