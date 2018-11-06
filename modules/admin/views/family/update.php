<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
$this->title = 'Update Family: ' . ((isset($user->first_name) && $user->first_name != null) ? ucfirst(strtolower($user->first_name)) : "Not Given") . ' ' . ((isset($model->last_name) && $model->last_name != null) ? ucfirst(strtolower($model->last_name)) : "");
$this->params['breadcrumbs'][] = ['label' => 'Families', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->first_name . ' ' . $user->last_name, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="family-update">
    <?=
    $this->render('_form_update', [
        'user' => $user,
        'family' => $family,
        'lookingcare' => $lookingcare,
        'family_care_person' => $family_care_person,
        'all_other_duties' => $all_other_duties,
        'all_accomodations' => $all_accomodations,
        'all_perks' => $all_perks,
        'caringExperienceType' => $caringExperienceType,
    ])
    ?>
</div>