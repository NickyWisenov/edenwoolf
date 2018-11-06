<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update Static Page: ' . ((isset($model->page_name) && $model->page_name != null) ? ucfirst(strtolower($model->page_name)) : "Not Given");
$this->params['breadcrumbs'][] = ['label' => 'Static Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->page_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staticpages-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>
</div>
