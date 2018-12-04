<?php

use yii\widgets\Breadcrumbs;
use yii\bootstrap\Alert;
use app\assets\backend\MainAsset;

MainAsset::register($this);
?>
<?php $this->beginContent('@app/modules/admin/views/layouts/main.php'); ?>
<!-- BEGIN HEADER -->
<?= Yii::$app->controller->renderPartial('@app/modules/admin/views/partials/header.php'); ?>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- END SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <?= Yii::$app->controller->renderPartial('@app/modules/admin/views/partials/left'); ?>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <?=
            Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Home',
                    'url' => ['dashboard/'],
                    'template' => '<li><i class="icon-home"></i> {link}</li>',
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);
            if (Yii::$app->getSession()->hasFlash('success')) {
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-success',
                    ],
                    'body' => Yii::$app->getSession()->getFlash('success'),
                ]);
            }
            if (Yii::$app->getSession()->hasFlash('danger')) {
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-danger',
                    ],
                    'body' => Yii::$app->getSession()->getFlash('danger'),
                ]);
            }
            ?>
            <?= $content; ?>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <?php // echo Yii::$app->controller->renderPartial('@app/modules/admin/views/partials/sidebar'); ?>
    <!-- END QUICK SIDEBAR -->
</div>
<!-- BEGIN FOOTER -->
<?= Yii::$app->controller->renderPartial('@app/modules/admin/views/partials/footer'); ?>
<!-- END FOOTER -->
<?php $this->endContent(); ?>