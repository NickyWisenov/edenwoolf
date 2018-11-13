<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\Category;
use app\assets\backend\CropperAsset;
CropperAsset::register($this);

$imageurl = Yii::$app->urlManager->createUrl('./../../') . '/' .$model->image;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => false]) ?>

    <?= $form->field($model, 'subheading')->textInput(['maxlength' => false]) ?>


    <?= $form->field($model, 'body')->textArea(['class' => "form-control ckeditor", 'placeholder' => "Body Text"])->label('Body Text'); ?>

    <div class="form-group" id="dispalyImageDiv">
        <label class="control-label" style="display:block;">Image</label>
        <div class="img-preview" style="margin-top: 5px; position: relative;">
            <a style="display:none;" id="deleteImageOuter" class="deleteImage" href="javascript:void(0);" onclick="deleteImageOuter()"><i class="fa fa-times"></i></a>
            <a class="cropped" id="dispalyImageOriginal" data-photo="" onclick="showPortfolio(this)" href="javascript:void(0);">
                <img style="width: 50%; height: 300px;" id="dispalyImageP" class="img-thumbnail" alt="" src="<?= $imageurl ?>" height="90px" width="100px">
                <?= $form->field($model, 'image')->hiddenInput(['id' => "image"])->label(false); ?>
            </a>
        </div>
        <span class="btn default btn-file">
            <span class="fileinput-new" onclick="showModal()"> Select Image </span>
        </span>
    </div>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'), ['class' => 'form-control', 'prompt' => 'All']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div id="cropper" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Upload Image</h4>
            </div>
            <div class="modal-body">
                <header class="header">
                    <span class="main_title">Edit Your Image</span>
                    <button-box></button-box>
                </header>
                <main class="main main-custom">
                    <upload-box></upload-box>
                    <canvas-box></canvas-box>
                </main>
                <script id="button-box" type="text/x-template">
                    <div @click="click" class="menu">
                        <label for="file" title="Upload" v-show="!uploaded" class="menu__button">
                            <span style="margin-top: 16px;" class="fa fa-upload"></span>
                        </label>
                        <button data-action="restore" title="Undo (Ctrl + Z)" v-show="cropped" class="menu__button">
                            <span class="fa fa-undo"></span>
                        </button>
                        <button data-action="remove" title="Delete (Delete)" v-show="uploaded &amp;&amp; !cropping" class="menu__button menu__button--danger remove">
                            <span class="glyphicon glyphicon-trash "></span>
                        </button>
                        <button data-action="clear" title="Cancel (Esc)" v-show="cropping" class="menu__button menu__button--danger">
                            <span class="fa fa-ban"></span>
                        </button>
                        <button data-action="crop" title="OK (Enter)" v-show="cropping" class="menu__button menu__button--success">
                            <span class="fa fa-check"></span>
                        </button>
                    </div>
                </script>
                <script id="upload-box" type="text/x-template">
                    <div @change="change" @dragover="dragover" @drop="drop" v-show="!uploaded" class="upload">
                        <p>
                            Drop image here or
                            <label class="browse">browse...<input id="file" type="file" accept="image/*" class="sr-only"></label>
                        </p>
                    </div>
                </script>
                <script id="canvas-box" type="text/x-template">
                    <div v-show="editable" class="canvas">
                        <div @dblclick="dblclick" class="editor">
                            <template v-if="url">
                                <img src="{{ url }}" alt="{{ name }}" class="image-circle" @load="load">
                            </template>
                        </div>
                        <div @click="click" v-show="cropper" class="toolbar">
                            <button data-action="move" title="Move (M)" class="toolbar__button">
                                <span class="fa fa-arrows"></span>
                            </button>
                            <button data-action="crop" title="Crop (C)" class="toolbar__button">
                                <span class="fa fa-crop"></span>
                            </button>
                            <button data-action="zoom-in" title="Zoom In (I)" class="toolbar__button">
                                <span class="fa fa-search-plus"></span>
                            </button>
                            <button data-action="zoom-out" title="Zoom Out (O)" class="toolbar__button">
                                    <span class="fa fa-search-minus"></span>
                            </button>
                            <button data-action="rotate-left" title="Rotate Left (L)" class="toolbar__button">
                                <span class="fa fa-rotate-left"></span>
                            </button>
                            <button data-action="rotate-right" title="Rotate Right (R)" class="toolbar__button">
                                <span class="fa fa-rotate-right"></span>
                            </button>
                            <button data-action="flip-horizontal" title="Flip Horizontal (H)" class="toolbar__button">
                                <span class="fa fa-arrows-h"></span>
                            </button>
                            <button data-action="flip-vertical" title="Flip Vertical (V)" class="toolbar__button">
                                <span class="fa fa-arrows-v"></span>
                            </button>
                        </div>
                    </div>
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="javascript:void(0);"  onclick="uploadBlogImage()" class="btn btn-primary">Upload</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
