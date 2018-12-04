<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'View Static Page: ' . ((isset($model->page_name) && $model->page_name != null) ? ucfirst(strtolower($model->page_name)) : "Not Given");
$this->params['breadcrumbs'][] = ['label' => 'Static Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->page_name;
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
                            <label class="control-label col-md-3">Slug:</label>
                            <div class="col-md-9">
                                <span class="form-control-static"> <?= (isset($model->slug) && $model->slug != null) ? $model->slug : "Not Given"; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Page Name:</label>
                            <div class="col-md-9">
                                <span class="form-control-static"> <?= (isset($model->page_name) && $model->page_name != null) ? $model->page_name : "Not Given"; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Content:</label>
                            <div class="col-md-9">
                                <span class="form-control-static"> <?= (isset($model->content) && $model->content != null) ? $model->content : "Not Given"; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions text-right">
                <a href="<?= Url::to(['staticpages/update', 'id' => $model->id]); ?>" class="btn green">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="<?= Url::to(['staticpages/index']); ?>" class="btn default">Back</a>                   
            </div>
        </form>
    </div>
</div>
