<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$imageurl = Yii::$app->urlManager->createUrl('./../../') . '/' .$model->image;

?>
<div class="blog-view">

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-eye font-green-haze"></i>
                <span class="caption-subject font-green-haze bold uppercase">View Blog</span>
            </div>
        </div>
        <div class="portlet-body blog-view">
            <h1 class="title"><?= $model->title ?></h1>

            <h2 class="subheading"><?= $model->subheading ?></h2>
            
            <div class="blog-img">
                <img src="<?= $imageurl ?>">
            </div>

            <div class="blog-body">
                <?= \yii\helpers\HtmlPurifier::process($model->body); ?>
            </div>
            <p>
                <a class="author" href="#"><?= $model->user->display_name ?></a>
            </p>
            <p>
                <?= $model->created_at ?>
            </p>
        </div>
        <div class="form-actions text-right">
            <a href="<?= Url::to(['blogs/update', 'id' => $model->id]); ?>" class="btn green">
                <i class="fa fa-pencil"></i> Edit
            </a>
            <a href="<?= Url::to(['blogs/index']); ?>" class="btn default">Back</a>                   
        </div>
    </div>

</div>
