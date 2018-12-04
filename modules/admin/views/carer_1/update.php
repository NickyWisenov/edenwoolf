<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
$this->title = 'Update Carer: ' . ((isset($model->first_name) && $model->first_name != null) ? ucfirst(strtolower($model->first_name)) : "Not Given") . ' ' . ((isset($model->last_name) && $model->last_name != null) ? ucfirst(strtolower($model->last_name)) : "");
$this->params['breadcrumbs'][] = ['label' => 'Carers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->first_name . ' ' . $model->last_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carer-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>
</div>