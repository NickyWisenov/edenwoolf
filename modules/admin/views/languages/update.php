<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update Multilingual Setting: ' . ((isset($model->language_temp) && $model->language_temp != null) ? ucfirst(strtolower($model->language_temp)) : "Not Given");
$this->params['breadcrumbs'][] = ['label' => 'Multilingual Setting', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->language_temp, 'url' => ['view', 'id' => $model->id, 'language' => $model->language]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="languages-update">

    <?=
    $this->render('_form', [
        'model' => $model,
        'language' => $language,
    ])
    ?>

</div>