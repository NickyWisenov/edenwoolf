<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
$this->title = 'Create Carer';
$this->params['breadcrumbs'][] = ['label' => 'Carers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carer-create">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>
</div>