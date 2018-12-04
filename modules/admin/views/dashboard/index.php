<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp">
                        <span data-counter="counterup" data-value="<?= $total_carer; ?>">0</span>
                    </h3>
                    <small>TOTAL CARER</small>
                </div>
                <div class="icon">
                    <i class="fa fa-user-md"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="status">
                    <div class="status-title"> carer </div>
                    <a href="<?= Url::to(['carer/']); ?>" class="status-number"> VIEW </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-purple-soft">
                        <span data-counter="counterup" data-value="<?= $total_family; ?>">0</span>
                    </h3>
                    <small>TOTAL FAMILY</small>
                </div>
                <div class="icon">
                    <i class="icon-user"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="status">
                    <div class="status-title"> family </div>
                    <a href="<?= Url::to(['family/']); ?>" class="status-number"> VIEW </a>
                </div>
            </div>
        </div>
    </div>
    <!--    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp">
                            <span data-counter="counterup" data-value="0">0</span>
                        </h3>
                        <small>TOTAL STUDENTS</small>
                    </div>
                    <div class="icon">
                        <i class="icon-user"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="status">
                        <div class="status-title"> students </div>
                        <a href="<?= Url::to(['student/']); ?>" class="status-number"> VIEW </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="0">0</span>
                        </h3>
                        <small>TOTAL TEACHERS</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-md"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="status">
                        <div class="status-title"> teachers </div>
                        <a href="<?= Url::to(['teacher/']); ?>" class="status-number"> VIEW </a>
                    </div>
                </div>
            </div>
        </div>-->
</div>