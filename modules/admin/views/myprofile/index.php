<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\assets\backend\ProfileAsset;
use app\assets\backend\CropperAsset;

ProfileAsset::register($this);
CropperAsset::register($this);

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .profile-userpic img {
        width: 150px;
        height: 150px;
    }
    .deleteImage {
        position: absolute;
        top: -9px;
        margin-left: 150px;
        background: #17c4bb;
        border-radius: 50% !important;
        padding: 3px 7px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="profile-sidebar">
            <div class="portlet light profile-sidebar-portlet">
                <div class="profile-userpic">
                    <?php
                    if (isset($admin->image) && !empty($admin->image)) {
                        echo Html::img('@web/uploads/admin/profile_picture/preview/' . $admin->image, ['class' => "img-responsive", 'alt' => ""]);
                    } else {
                        ?>
                        <img alt="" class="img-responsive" src="<?= Yii::$app->request->baseUrl; ?>/backend/assets/pages/img/admin-default.jpg">
                        <?php
                    }
                    ?>
                </div>
                <div class="profile-usertitle">
                    <?php
                    $name = 'Admin';
                    if (isset($admin->first_name) && $admin->first_name != '' && isset($admin->last_name) && $admin->last_name != '') {
                        $name = $admin->first_name . ' ' . $admin->last_name;
                    }
                    ?>
                    <div class="profile-usertitle-name"> <?= $name; ?></div>
                </div>
                <div class="profile-usermenu"></div>
            </div>
        </div>
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Account Settings</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="<?php if ($active_tab == 'tab_1_1') echo 'active'; ?>">
                                    <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                </li>
                                <li class="<?php if ($active_tab == 'tab_1_2') echo 'active'; ?>">
                                    <a href="#tab_1_2" data-toggle="tab">Change Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane <?php if ($active_tab == 'tab_1_1') echo 'active'; ?>" id="tab_1_1">
                                    <?php $form = ActiveForm::begin(['id' => 'admin-profile-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                                    <input type="hidden" name='tab' value="tab_1_1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">First Name <span class="required">*</span></label>
                                                <?= $form->field($admin, 'first_name')->textInput(['class' => 'form-control', 'placeholder' => 'First Name'])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Last Name <span class="required">*</span></label>
                                                <?= $form->field($admin, 'last_name')->textInput(['class' => 'form-control', 'placeholder' => 'Last Name'])->label(false); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">E-mail <span class="required">*</span></label>
                                        <?= $form->field($admin, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'E-mail'])->label(false); ?> 
                                    </div>
                                    <div class="form-group" id="dispalyImageDiv">
                                        <label class="control-label" style="display:block;">Profile Picture</label>
                                        <div class="img-preview" style="margin-top: 5px; position: relative;">
                                            <a style="display:none;" id="deleteImageOuter" class="deleteImage" href="javascript:void(0);" onclick="deleteImageOuter()"><i class="fa fa-times"></i></a>
                                            <a class="cropped" id="dispalyImageOriginal" data-photo="<?= ($admin->image != '') ? Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/admin/profile_picture/thumb/' . $admin->image : Yii::$app->getUrlManager()->getBaseUrl() . '/backend/assets/pages/img/admin-default.jpg'; ?>" onclick="showPortfolio(this)" href="javascript:void(0);">
                                                <img style="width: 170px; height: 150px;" id="dispalyImageP" class="img-thumbnail" alt="" src="<?= ($admin->image != '') ? Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/admin/profile_picture/thumb/' . $admin->image : Yii::$app->getUrlManager()->getBaseUrl() . '/backend/assets/pages/img/admin-default.jpg'; ?>" height="90px" width="100px">
                                                <?= $form->field($admin, 'image')->hiddenInput(['class' => "form-control", 'id' => "image_name"])->label(false); ?>
                                            </a>
                                        </div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new" onclick="showModal()"> Select Image </span>
                                        </span>
                                    </div>
                                    <hr/>
                                    <div class="margiv-top-10 text-right">
                                        <button type="submit" class="btn green">Save Changes</button>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                                <div class="tab-pane <?php if ($active_tab == 'tab_1_2') echo 'active'; ?>" id="tab_1_2">
                                    <?php $form = ActiveForm::begin(['id' => 'admin-password-form']); ?>
                                    <input type="hidden" name='tab' value="tab_1_2">
                                    <div class="form-group">
                                        <label class="control-label">Old Password <span class="required">*</span></label>
                                        <?= $form->field($model, 'old_password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Old Password'])->label(false); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">New Password <span class="required">*</span></label>
                                        <?= $form->field($model, 'new_password')->passwordInput(['class' => 'form-control', 'placeholder' => 'New Password'])->label(false); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Retype Password <span class="required">*</span></label>
                                        <?= $form->field($model, 'retype_password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Retype Password'])->label(false); ?>
                                    </div>
                                    <hr/>
                                    <div class="margin-top-10 text-right">
                                        <button type="submit" class="btn green">Save Changes</button>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div id="cropper" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Upload Profile Image</h4>
            </div>
            <div class="modal-body">
                <header class="header">
                    <span class="main_title">Edit Your Photo</span>
                    <button-box>

                    </button-box>
                </header>
                <main class="main main-custom">
                    <upload-box>

                    </upload-box>
                    <canvas-box>

                    </canvas-box>
                </main>
                <script id="button-box" type="text/x-template">
                    <div @click="click" class="menu">
                    <label for="file" title="Upload" v-show="!uploaded" class="menu__button"><span style="margin-top: 16px;" class="fa fa-upload">
                    </span>
                    </label>
                    <button data-action="restore" title="Undo (Ctrl + Z)" v-show="cropped" class="menu__button"><span class="fa fa-undo">
                    </span>
                    </button>
                    <button data-action="remove" title="Delete (Delete)" v-show="uploaded &amp;&amp; !cropping" class="menu__button menu__button--danger remove"><span class="glyphicon glyphicon-trash "></span></button>
                    <button data-action="clear" title="Cancel (Esc)" v-show="cropping" class="menu__button menu__button--danger"><span class="fa fa-ban"></span></button>
                    <button data-action="crop" title="OK (Enter)" v-show="cropping" class="menu__button menu__button--success"><span class="fa fa-check"></span></button>
                    </div>
                </script>
                <script id="upload-box" type="text/x-template">
                    <div @change="change" @dragover="dragover" @drop="drop" v-show="!uploaded" class="upload"><p>Drop image here or<label class="browse">browse...<input id="file" type="file" accept="image/*" class="sr-only"></label></p></div>
                </script>
                <script id="canvas-box" type="text/x-template"><div v-show="editable" class="canvas"><div @dblclick="dblclick" class="editor"><template v-if="url"><img src="{{ url }}" alt="{{ name }}" class="image-circle" @load="load"></template></div><div @click="click" v-show="cropper" class="toolbar"><button data-action="move" title="Move (M)" class="toolbar__button"><span class="fa fa-arrows"></span></button><button data-action="crop" title="Crop (C)" class="toolbar__button"><span class="fa fa-crop"></span></button><button data-action="zoom-in" title="Zoom In (I)" class="toolbar__button"><span class="fa fa-search-plus"></span></button><button data-action="zoom-out" title="Zoom Out (O)" class="toolbar__b                                                                                    utton">
                    <span class="fa fa-search-minus"></spa                                n></button>
                    <button data-action="rotate-left" title="Rotate Left (L)" c                                    lass="toolba                                                                r__button">
                    <span class="fa fa-rotate-left"></span></button><button data-action="rotate-right" title="Rotate Right (R)" class="toolbar__button"><span class="fa fa-rotate-right"></span></button><button data-action="flip-horizontal" title="Flip Horizontal (H)" class="toolbar__button"><span class="fa fa-arrows-h"></span></butt                                                                                                        on>
                    <button data-action="flip-vertical" title="Flip Vertical (V)" class="toolbar__b                                                                                                            utton">
                    <span class="fa fa-arrows-v"></span></button></div></div>
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="javascript:void(0);"  onclick="changeImage()" class="btn btn-primary">Save changes</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>