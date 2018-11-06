<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Seo;
use app\models\SearchSeo;

class SeoController extends AdminController {

    public function columns() {
        $viewMsg = 'View';
        $updateMsg = 'Update';
        $gridColumns = [
                ['class' => 'kartik\grid\SerialColumn'],
                [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'route',
            ],
                [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'title',
                'value' => function ($model) {
                    return ($model->title != '') ? $model->title : "Not Set";
                }
            ],
                [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'description',
                'value' => function ($model) {
                    return ($model->description != '') ? ((strlen($model->description) > 20) ? (substr($model->description, 0, 20)) . ".." : $model->description) : "Not Set";
                }
            ],
                [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'keyword',
                'value' => function ($model) {
                    return ($model->keyword != '') ? ((strlen($model->keyword) > 20) ? (substr($model->keyword, 0, 20)) . ".." : $model->keyword) : "Not Set";
                }
            ],
                [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'urlCreator' => function($action, $model, $key, $index) {
                    switch ($action) {
                        case "view":
                            return Url::to(['seo/view', 'id' => $model->id]);
                            break;
                        case "update":
                            return Url::to(['seo/update', 'id' => $model->id]);
                            break;
                    }
                },
                'template' => '{view} {update}',
                'viewOptions' => ['title' => $viewMsg, 'data-toggle' => 'tooltip'],
                'updateOptions' => ['title' => $updateMsg, 'data-toggle' => 'tooltip'],
            ]
        ];
        return $gridColumns;
    }

    public function actionIndex() {
        $model = new SearchSeo;
        $dataProvider = $model->search(Yii::$app->request->queryParams);
        $widget = GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $model,
                    'columns' => $this->columns(),
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
        ]);
        return $this->render('index', ['widget' => $widget]);
    }

    public function actionView($id) {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $data['model'] = $model;
        if (Yii::$app->request->post()) {
            $model->title = $_POST['Seo']['title'];
            $model->description = $_POST['Seo']['description'];
            $model->keyword = $_POST['Seo']['keyword'];
            $model_validate = $model->validate();
            if ($model_validate) {
                $model->save(false);
                Yii::$app->session->setFlash('success', 'SEO updated successfully.');
                return $this->refresh();
            }
        }
        return $this->render('update', $data);
    }

    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->status = '3';
        $model->save(false);
        Yii::$app->session->setFlash('success', 'SEO deleted successfully.');
        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = Seo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
