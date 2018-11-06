<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa <?= $model->isNewRecord ? 'fa-plus' : 'fa-edit'; ?> font-green-haze" aria-hidden="true"></i>
            <span class="caption-subject font-green-haze bold uppercase"><?= Html::encode($this->title) ?></span>
        </div>
    </div>
    <div class="portlet-body form">
        <?php
        $form = ActiveForm::begin([
                    'options' => ['class' => 'form-horizontal form-row-seperated', 'enctype' => 'multipart/form-data'],
                    'enableClientValidation' => false
                ])
        ?>
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">Name </label>
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['class' => "form-control", 'placeholder' => "Name", 'disabled' => true])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Email </label>
                <div class="col-md-6">
                    <?= $form->field($model, 'email')->textInput(['class' => "form-control", 'placeholder' => "Email", 'disabled' => true])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Phone </label>
                <div class="col-md-6">
                    <?= $form->field($model, 'phone_no')->textInput(['class' => "form-control", 'placeholder' => "Phone", 'disabled' => true])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Message </label>
                <div class="col-md-6">
                    <?= $form->field($model, 'message')->textArea(['class' => "form-control", 'placeholder' => "Message", 'rows' => '6', 'disabled' => true])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Reply </label>
                <div class="col-md-6">
                    <?= $form->field($model, 'reply_message')->textArea(['class' => "form-control", 'placeholder' => "Reply Message", 'rows' => '6', 'value' => ($model->reply_message != null) ? $model->reply_message : "", 'disabled' => ($model->reply_status == '1') ? true : false])->label(false); ?>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <?php
                    if ($model->reply_status != '1') {
                        ?>
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Reply', ['class' => 'btn green']) ?>
                        <?php
                    }
                    ?>
                    <a href="<?= Url::to(['contactus/view', 'id' => $model->id]); ?>" class="btn default">Back</a>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>