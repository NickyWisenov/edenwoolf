<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Lock Screen';
$this->params['breadcrumbs'][] = $this->title;

$cookies = Yii::$app->request->cookies;
?>
<style>
    .help-block.help-block-error{
        position: absolute;
        bottom: -25px;
    }
</style>
<div class="page-lock">
    <div class="page-logo">
        <a class="brand" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/auth/lockscreen']); ?>">
            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/logo.png" style="height: 60px;" alt="logo" /> </a>
    </div>
    <div class="page-body">
        <?php
        if (isset($admin_model->image) && !empty($admin_model->image)) {
            echo Html::img('@web/uploads/admin/profile_picture/preview/' . $admin_model->image, ['class' => "page-lock-img", 'alt' => ""]);
        } else {
            ?>
            <img class="page-lock-img" src="<?= Yii::$app->request->baseUrl; ?>/backend/assets/pages/img/admin-default.jpg" alt="">
            <?php
        }
        ?>
        <div class="page-lock-info">
            <h1><?= ((isset($admin_model->first_name) && $admin_model->first_name != null) ? ucfirst(strtolower($admin_model->first_name)) : "Not Given") . ' ' . ((isset($admin_model->last_name) && $admin_model->last_name != null) ? ucfirst(strtolower($admin_model->last_name)) : ""); ?></h1>
            <span class="email"> <?= $admin_model->email; ?> </span>
            <span class="locked"> Locked </span>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'admin-login-form',
                        'options' => ['class' => 'login-form'],
            ]);
            ?>
            <div class="input-group input-medium">
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password'])->label(false); ?>
                <span class="input-group-btn">
                    <?= Html::submitButton('<i class="m-icon-swapright m-icon-white"></i>', ['class' => 'btn green icn-only', 'name' => 'lock-button']) ?>
                </span>
            </div>
            <!-- /input-group -->
            <!--            <div class="relogin">
                            <a href="login.html"> Not Bob Nilson ? </a>
                        </div>-->
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="page-footer-custom"> <?= date('Y'); ?> &copy; Eden Woolf. </div>
</div>