<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'View Multilingual Setting: ' . ((isset($model->language_temp) && $model->language_temp != null) ? ucfirst(strtolower($model->language_temp)) : "Not Given");
$this->params['breadcrumbs'][] = ['label' => 'Multilingual Setting', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->language_temp;
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye font-green-haze"></i>
            <span class="caption-subject font-green-haze bold uppercase"><?= Html::encode($this->title) ?></span>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Language:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?= (isset($model->language_temp) && $model->language_temp != null) ? ucfirst(strtolower($model->language_temp)) : "Not Given"; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Content:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?= (isset($model->translation) && $model->translation != null) ? $model->translation : "Not Given"; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions text-right">
                <a href="<?= Url::to(['languages/update', 'id' => $model->id, 'language' => $model->language]); ?>" class="btn green">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="<?= Url::to(['languages/index']); ?>" class="btn default">Back</a>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>