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
                <label class="col-md-2 control-label">Content Name <span class="required">*</span></label>
                <div class="col-md-9">
                    <?= $form->field($model, 'content_name')->textInput(['class' => "form-control", 'placeholder' => "Content Name"])->label(false); ?>
                </div>
            </div>
            <?php
            if ($model->type == '1') {
                ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">Content <span class="required">*</span></label>
                    <div class="col-md-9">
                        <?= $form->field($model, 'content')->textArea(['class' => "form-control ckeditor", 'placeholder' => "Content"])->label(false); ?>
                        <?php
                        if ($model->instruction != "") {
                            ?>
                            <br>
                            <h3><i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="<?= $model->instruction; ?>"></i></h3>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            } else if ($model->type == '2') {
                ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">Image <span class="required">*</span></label>
                    <div class="col-md-9">
                        <img class="img-responsive" src="<?php echo Yii::$app->request->baseUrl . '/uploads/frontend/cms/pictures/' . $model->content; ?>" alt="<?= $model->content; ?>">
                        <br>
                        <h3><i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="<?= $model->instruction; ?>"></i></h3>
                        <?= $form->field($model, 'content')->fileInput()->label(false); ?>
                    </div>
                </div>
                <?php
            } else if ($model->type == '3') {
                ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">Video <span class="required">*</span></label>
                    <div class="col-md-9">
                        <video controls class="img-responsive">
                            <source src="<?php echo Yii::$app->request->baseUrl . '/uploads/frontend/cms/videos/' . $model->content; ?>" type="video/mp4" alt="<?= $model->content; ?>">
                        </video>
                        <br>
                        <?= $form->field($model, 'content')->fileInput()->label(false); ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn green']) ?>
                    <a href="<?= Url::to(['cms/view', 'id' => $model->id]); ?>" class="btn default">Back</a>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>