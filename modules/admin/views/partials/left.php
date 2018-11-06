<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\admin\controllers\AdminController;
?>
<ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
    <li class="nav-item <?= AdminController::Route() == 'dashboard/index' ? 'active' : ''; ?>">
        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/dashboard/index']); ?>" class="nav-link nav-toggle">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
            <span class="selected"></span>
            <span class="arrow open"></span>
        </a>
    </li>
    <li class="nav-item <?= Yii::$app->controller->id == 'carer' || Yii::$app->controller->id == 'family' ? 'active' : ''; ?>">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Users</span>
            <?= (Yii::$app->controller->id == 'carer' || Yii::$app->controller->id == 'family') ? '<span class="selected"></span><span class="arrow"></span>' : ''; ?>
        </a>
        <ul class="sub-menu">
            <li class="nav-item">
                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/carer/index']); ?>" class="nav-link ">
                    <span class="title">Carers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/family/index']); ?>" class="nav-link ">
                    <span class="title">Families</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item <?= AdminController::Route() == 'myprofile/index' ? 'active' : ''; ?>">
        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/myprofile/index']); ?>" class="nav-link nav-toggle">
            <i class="icon-wrench"></i>
            <span class="title">Account Settings</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item <?= Yii::$app->controller->id == 'cms' ? 'active' : ''; ?>">
        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/cms/index']); ?>" class="nav-link nav-toggle">
            <i class="fa fa-picture-o"></i>
            <span class="title">CMS</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item <?= Yii::$app->controller->id == 'contactus' ? 'active' : ''; ?>">
        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/contactus/index']); ?>" class="nav-link nav-toggle">
            <i class="fa fa-phone"></i>
            <span class="title">Contact Us</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item <?= Yii::$app->controller->id == 'emails' ? 'active' : ''; ?>">
        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/emails/index']); ?>" class="nav-link nav-toggle">
            <i class="icon-envelope"></i>
            <span class="title">Emails</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item <?= Yii::$app->controller->id == 'default' ? 'active' : ''; ?>">
        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/settings/']); ?>" class="nav-link nav-toggle">
            <i class="fa fa-cog"></i>
            <span class="title">Global Settings</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
<!--    <li class="nav-item <?= Yii::$app->controller->id == 'languages' ? 'active' : ''; ?>">
     <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/languages/index']); ?>" class="nav-link nav-toggle">
         <i class="fa fa-language"></i>
         <span class="title">Language</span>
         <span class="selected"></span>
         <span class="arrow"></span>
     </a>
 </li>-->
    <li class="nav-item <?= Yii::$app->controller->id == 'seo' ? 'active' : ''; ?>">
        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/seo/index']); ?>" class="nav-link nav-toggle">
            <i class="icon-list"></i>
            <span class="title">SEO</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item <?= Yii::$app->controller->id == 'staticpages' ? 'active' : ''; ?>">
        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/staticpages/index']); ?>" class="nav-link nav-toggle">
            <i class="icon-layers"></i>
            <span class="title">Static Pages</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item <?= Yii::$app->controller->id == 'blogs' ? 'active' : ''; ?>">
        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/blogs/index']); ?>" class="nav-link nav-toggle">
            <i class="icon-docs"></i>
            <span class="title">Blogs</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    <li class="nav-item <?= Yii::$app->controller->id == 'comments' ? 'active' : ''; ?>">
        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/comments/index']); ?>" class="nav-link nav-toggle">
            <i class="icon-speech"></i>
            <span class="title">Comments</span>
            <span class="selected"></span>
            <span class="arrow"></span>
        </a>
    </li>
    
</ul>