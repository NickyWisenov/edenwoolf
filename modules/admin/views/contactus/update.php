<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Reply Contact Us: ' . ((isset($model->name) && $model->name != null) ? ucfirst(strtolower($model->name)) : "");
$this->params['breadcrumbs'][] = ['label' => 'Contact Us', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contactus-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
