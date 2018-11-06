<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'View Contact Us: ' . ((isset($model->name) && $model->name != null) ? ucfirst(strtolower($model->name)) : "");
$this->params['breadcrumbs'][] = ['label' => 'Contact Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye font-green-haze"></i>
            <span class="caption-subject font-green-haze bold uppercase">View Contact Us</span>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?= (isset($model->name) && $model->name != null) ? ucfirst(strtolower($model->name)) : "Not Given"; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Email:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?= (isset($model->email) && $model->email != null) ? $model->email : "Not Given"; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Phone No:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?= (isset($model->phone_no) && $model->phone_no != null) ? $model->phone_no : "Not Given"; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Message:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?= (isset($model->message) && $model->message != null) ? $model->message : "Not Given"; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Reply:</label>
                            <div class="col-md-9">
                                <p class="form-control-static"> <?= (isset($model->reply_message) && $model->reply_message != null) ? $model->reply_message : "Not Replied"; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions text-right">
                <a href="<?= Url::to(['contactus/reply', 'id' => $model->id]); ?>" class="btn green">
                    <i class="fa fa-reply"></i> Reply
                </a>
                <a href="<?= Url::to(['contactus/index']); ?>" class="btn default">Back</a>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
