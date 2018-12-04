<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
$this->title = 'Update Carer: ' . ((isset($user->first_name) && $user->first_name != null) ? ucfirst(strtolower($user->first_name)) : "Not Given") . ' ' . ((isset($user->last_name) && $user->last_name != null) ? ucfirst(strtolower($user->last_name)) : "");
$this->params['breadcrumbs'][] = ['label' => 'Carers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->first_name . ' ' . $user->last_name, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carer-update">
    <?=
    $this->render('_form_update', [
        'user' => $user,
        'carer'=>$carer,
        'all_languages'=>$all_languages,
        'all_job_descriptions'=>$all_job_descriptions,
        'all_qualifications'=>$all_qualifications,
        'all_caring_exp_type'=>$all_caring_exp_type,
        'all_other_duties'=>$all_other_duties,
    ])
    ?>
</div>