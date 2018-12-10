<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseStringHelper;
use kartik\grid\GridView;
// use yii\grid\GridView;
use yii\jui\DatePicker;

use app\models\Category;
use app\models\UserMaster;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h3 class="page-title"><?= $this->title; ?>
        <small>Manage all the <?= strtolower($this->title); ?> of the site from here</small>
    </h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'user_id',
                'value' => function ($data) {
                    return $data->user->display_name;
                },
                'label' => 'UserName',
                'options' => ['width' => 200],
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(UserMaster::find()->asArray()->all(), 'id', 'display_name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                    'options' => ['multiple' => false],
                ],
                'filterInputOptions' => ['placeholder' => 'Select']

            ],
            'title',
            'subheading',
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute'=>'body',
                'format' => 'raw',
                'filter'=> '',
                'value' => function($data){
                    return BaseStringHelper::truncate($data->body, 500, ' ... ', null, true); 
                },
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute'=>'image',
                'format' => 'raw',
                'options' => ['width' => '100'],
                'filter'=> '',
                'value' => function($data){
                    $imageurl = Yii::$app->urlManager->createUrl('./../../') . '/' .str_replace('original', 'thumb', $data->image);
                    return Html::img($imageurl, ['width' => '200px']);
                },
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'category_id',
                'options' => ['width' => '120'],
                'value' => function ($data) {
                    return $data->category->category_name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                    'options' => ['multiple' => false],
                ],
                'filterInputOptions' => ['placeholder' => 'Select'],
                'contentOptions' => ['class' => 'toggle-allow', 'style' => 'text-align:left;padding-left: 20px;'],
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'created_at',
                'label'=>'Created At',
                // 'filter' => DatePicker::widget(['dateFormat' => 'yyyy-MM-dd','model'=>$searchModel,'attribute'=>'CREATED_AT']),
                // 'format' => 'html',
            ],
            [
                'class' => '\kartik\grid\ActionColumn',
                'header' => 'Actions',
                'template' => '{view} {update} {delete}',
                'headerOptions' => ['width' => '80'],
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:;', ['onclick' =>"deleteBlog('$url');"]);
                    }
                ]
                
            ],
        ],
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export'] // remove this row from export
            ]
        ],
        'toolbar' => [
            ['content' => 
                Html::a('<i class="glyphicon glyphicon-plus"></i> Create Blog ', ['create'], ['class' => 'btn btn-info create-blog-btn']) .
                Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset', ['index'], ['class' => 'btn btn-info'])
            ],
        ],
        'pjax' => true,
        'bootstrap' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => false,
        'perfectScrollbar' => false,
        'perfectScrollbarOptions' => ['position' => 'relative', 'height' => '2px'],
        'showPageSummary' => false,
        'panel' => [
            'heading' => false,
            'heading' => '<h3 class="panel-title"><i class="icon-user"></i> Seo</h3>',
            'heading' => '',
            'type' => 'info',
        ],
    ]); ?>  
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deleteBlogModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #17C4BB;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: white;">Delete Blog</h4>
            </div>
            <div class="modal-body">
                <h4>Do you want to delete this Blog?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <a id="deleteBlogButton" class="btn btn-success" style="background-color: #17C4BB;">Yes</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script>
     function deleteBlog(url) {
        $("#deleteBlogButton").attr("href", url);
        $("#deleteBlogModal").modal('show');
    }
</script>