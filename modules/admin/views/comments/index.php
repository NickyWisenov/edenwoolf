<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use kartik\grid\GridView;
// use yii\grid\GridView;

use app\models\UserMaster;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-comment-dashboard">
	<h3 class="page-title"><?= $this->title; ?>
	    <small>Manage all the <?= strtolower($this->title); ?> of the site from here</small>
	</h3>
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
            'body:ntext',
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'created_at',
                'label'=>'Created At',
                // 'filter' => DatePicker::widget(['dateFormat' => 'yyyy-MM-dd','model'=>$searchModel,'attribute'=>'CREATED_AT']),
                // 'format' => 'html',
            ],
            [
            	
                'attribute' => 'status',
    	        'format' => 'raw',
                'value' => function($data) {
                    if ($data->status == 0) {
                    	return Html::a('Allow', ['comments/allow', 'id'=>$data->id], ['class' => 'btn btn-success btn-xs', 'data-pjax' => 0]);
                    } else {
                    	return Html::a('DisAllow', ['comments/disallow', 'id'=>$data->id], ['class' => 'btn btn-warning btn-xs', 'data-pjax' => 0]);
                    }
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(array('0' => array('id' => '0', 'status' => 'Not Allowed'), '1' => array('id' => '1', 'status' => 'Allowed')), 'id', 'status'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                    'options' => ['multiple' => false],
                ],
                'filterInputOptions' => ['placeholder' => 'Select'],
                'contentOptions' => ['class' => 'toggle-allow', 'style' => 'text-align:left;padding-left: 20px;'],

            ],
            [
                'attribute' => 'reported',
                'format' => 'raw',
                'value' => function($data) {
                    if ($data->reported == 1) {
                        return Html::a('Cancel Reported', ['comments/cancelreport', 'id'=>$data->id], ['class' => 'btn btn-success btn-xs', 'data-pjax' => 0]);
                    } else {
                        return "";
                    }
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(array('0' => array('id' => '0', 'reported' => 'Not Reported'), '1' => array('id' => '1', 'reported' => 'Reported Abuse')), 'id', 'reported'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                    'options' => ['multiple' => false],
                ],
                'filterInputOptions' => ['placeholder' => 'Select'],
                'contentOptions' => ['class' => 'toggle-allow', 'style' => 'text-align:left;padding-left: 20px;'],

            ],
            // 'likes',
            [
                'class' => '\kartik\grid\ActionColumn',
                'header' => 'Actions',
                'template' => '{delete}',
                'headerOptions' => ['width' => '80'],
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:;', ['onclick' =>"deleteComment('$url');"]);
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
            ['content' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset', ['index'], ['class' => 'btn btn-info'])
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


<div class="modal fade" tabindex="-1" role="dialog" id="deleteCommentModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #17C4BB;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: white;">Delete Comment</h4>
            </div>
            <div class="modal-body">
                <h4>Do you want to delete this Comment?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <a id="deleteCommentButton" class="btn btn-success" style="background-color: #17C4BB;">Yes</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script>
     function deleteComment(url) {
        $("#deleteCommentButton").attr("href", url);
        $("#deleteCommentModal").modal('show');
    }
</script>

