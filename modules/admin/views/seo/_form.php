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
                <label class="control-label col-md-3">Route </label>
                <div class="col-md-6">
                    <?= $form->field($model, 'route')->textInput(['class' => "form-control", 'placeholder' => "Route", 'readonly' => true])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Title </label>
                <div class="col-md-6">
                    <?= $form->field($model, 'title')->textArea(['class' => "form-control", 'placeholder' => "Title", 'rows' => '6'])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Description </label>
                <div class="col-md-6">
                    <?= $form->field($model, 'description')->textArea(['class' => "form-control", 'placeholder' => "Description", 'rows' => '6'])->label(false); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Keyword </label>
                <div class="col-md-6">
                    <?= $form->field($model, 'keyword')->textArea(['class' => "form-control", 'placeholder' => "Keyword", 'rows' => '6'])->label(false); ?>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn green']) ?>
                    <a href="<?= Url::to(['seo/view', 'id' => $model->id]); ?>" class="btn default">Back</a>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>