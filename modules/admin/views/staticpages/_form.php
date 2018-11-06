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
                <label class="col-md-2 control-label">Slug </label>
                <div class="col-md-9">
                    <?= $form->field($model, 'slug')->textInput(['class' => "form-control", 'placeholder' => "Slug", 'readonly' => true])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Page Name <span class="required">*</span></label>
                <div class="col-md-9">
                    <?= $form->field($model, 'page_name')->textInput(['class' => "form-control", 'placeholder' => "Page Name"])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Content <span class="required">*</span></label>
                <div class="col-md-9">
                    <?= $form->field($model, 'content')->textArea(['class' => "form-control ckeditor", 'placeholder' => "Content"])->label(false); ?>
                </div>
            </div>

        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn green']) ?>
                    <a href="<?= Url::to(['staticpages/view', 'id' => $model->id]); ?>" class="btn default">Back</a>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
