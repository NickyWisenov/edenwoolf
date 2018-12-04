<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update SEO: ' . ((isset($model->route) && $model->route != null) ? ucfirst(strtolower($model->route)) : "Not Set");
$this->params['breadcrumbs'][] = ['label' => 'SEO', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->route, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seo-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
