<?php
use app\assets\frontend\MainAsset;
MainAsset::register($this);
use app\assets\frontend\CarerAsset;
use app\assets\frontend\FamilyAsset;
use app\assets\frontend\LogJobAssets;
use app\assets\frontend\DatepickerAsset;
use app\assets\frontend\ClockpickerAsset;
use app\assets\frontend\BlogsAsset;

DatepickerAsset::register($this);
ClockpickerAsset::register($this);

if(Yii::$app->controller->id=='carer'){
   CarerAsset::register($this); 
}else if(Yii::$app->controller->id=='family'){
    FamilyAsset::register($this); 
}else if(Yii::$app->controller->id=='joblog'){
    LogJobAssets::register($this); 
} else if (Yii::$app->controller->id=='blogs') {
	BlogsAsset::register($this);
}
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<?= Yii::$app->controller->renderPartial('@app/views/partials/header.php'); ?>
<div class="index-body">
    <?= $content ?>
</div>
<?= Yii::$app->controller->renderPartial('@app/views/partials/footer.php'); ?>
<?= Yii::$app->controller->renderPartial('@app/views/partials/_all_modals.php'); ?>
<?php $this->endContent(); ?>