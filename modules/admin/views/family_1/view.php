<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\User */
$this->title = 'View Family: ' . ((isset($model->first_name) && $model->first_name != null) ? ucfirst(strtolower($model->first_name)) : "Not Given") . ' ' . ((isset($model->last_name) && $model->last_name != null) ? ucfirst(strtolower($model->last_name)) : "");
$this->params['breadcrumbs'][] = ['label' => 'Families', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->first_name . ' ' . $model->last_name;
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye font-green-haze"></i>
            <span class="caption-subject font-green-haze bold uppercase"><?= Html::encode($this->title) ?></span>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">First Name:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?= (isset($model->first_name) && $model->first_name != null) ? ucfirst(strtolower($model->first_name)) : "Not Given"; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Last Name:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?= (isset($model->last_name) && $model->last_name != null) ? ucfirst(strtolower($model->last_name)) : "Not Given"; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?= (isset($model->email) && $model->email != null) ? ucfirst(strtolower($model->email)) : "Not Given"; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Status:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?php
                                    if ($model->status == 1) {
                                        echo "Active";
                                    } else if ($model->status == 2) {
                                        echo "Suspended";
                                    } else {
                                        echo "Inactive";
                                    }
                                    ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions text-right">
                <a href="<?= Url::to(['family/update', 'id' => $model->id]); ?>" class="btn green">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="<?= Url::to(['family/']); ?>" class="btn default">Back</a>
            </div>
        </form>
    </div>
</div>