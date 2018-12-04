<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    #usermaster-status label{
        margin-left:25px;
    }
</style>

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
                    'enableClientValidation' => true
                ])
        ?>
        <?= $form->field($model, 'type_id')->hiddenInput(['value' => "2"])->label(false); ?>
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-3 control-label">Display Name <span class="required">*</span></label>
                <div class="col-md-6">
                    <?= $form->field($model, 'display_name')->textInput(['class' => "form-control", 'placeholder' => "Display Name"])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">First Name <span class="required">*</span></label>
                <div class="col-md-6">
                    <?= $form->field($model, 'first_name')->textInput(['class' => "form-control", 'placeholder' => "First Name"])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Last Name <span class="required">*</span></label>
                <div class="col-md-6">
                    <?= $form->field($model, 'last_name')->textInput(['class' => "form-control", 'placeholder' => "Last Name"])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Email <span class="required">*</span></label>
                <div class="col-md-6">
                    <?= $form->field($model, 'email')->input('email', ['class' => "form-control", 'placeholder' => "Email"])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Phone </label>
                <div class="col-md-6">
                    <?= $form->field($model, 'phone')->textInput(['class' => "form-control", 'placeholder' => "Phone"])->label(false); ?>
                </div>
            </div>
            <?php if (!$model->isNewRecord) { ?>
                <div class="form-group">
                    <label class="col-md-3 control-label">Status <span class="required">*</span></label>
                    <div class="col-md-6">
                        <div class="radio-list">                        
                            <label class="radio-inline">
                                <?= $form->field($model, 'status')->radioList(['1' => 'Active', '0' => 'Inactive', '2' => 'Suspended'])->label(false); ?>
                            </label>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn green']) ?>
                    <?php
                    if ($model->isNewRecord) {
                        ?>
                        <a href="<?= Url::to(['carer/index']); ?>" class="btn default">Back</a>
                        <?php
                    } else {
                        ?>
                        <a href="<?= Url::to(['carer/view', 'id' => $model->id]); ?>" class="btn default">Back</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>