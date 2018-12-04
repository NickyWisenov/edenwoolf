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
                    'enableClientValidation' => true
                ])
        ?>
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-2 control-label">About <span class="required">*</span></label>
                <div class="col-md-9">
                    <?= $form->field($model, 'about')->textInput(['class' => "form-control", 'placeholder' => "About"])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Subject <span class="required">*</span></label>
                <div class="col-md-9">
                    <?= $form->field($model, 'subject')->textInput(['class' => "form-control", 'placeholder' => "Subject"])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-9">
                    <div class="alert alert-info">
                        <?= $model->variable; ?>
                        <span class="required">
                            **Please don't change above variable in the body section
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Body <span class="required">*</span></label>
                <div class="col-md-9">
                    <?= $form->field($model, 'body')->textArea(['class' => "form-control ckeditor", 'placeholder' => "Body"])->label(false); ?>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn green']) ?>
                    <a href="<?= Url::to(['emails/view', 'id' => $model->id]); ?>" class="btn default">Back</a>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
