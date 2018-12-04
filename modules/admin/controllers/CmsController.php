<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Cms;
use app\models\SearchCms;

class CmsController extends AdminController {

    public function columns() {
        $viewMsg = 'View';
        $updateMsg = 'Update';
        $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'slug',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'page_name',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'content_name',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'updated_at',
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'urlCreator' => function($action, $model, $key, $index) {
                    switch ($action) {
                        case "view":
                            return Url::to(['cms/view', 'id' => $model->id]);
                            break;
                        case "update":
                            return Url::to(['cms/update', 'id' => $model->id]);
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
                $model = new SearchCms;
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
                                'heading' => '<h3 class="panel-title"><i class="icon-user"></i> Users</h3>',
                                'heading' => '',
                                'type' => 'info',
//                                        'type' => GridView::TYPE_PRIMARY,
//                                        'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Create User', ['create'], ['class' => 'btn btn-success']),
                            ],
                ]);
                return $this->render('index', ['widget' => $widget]);
            }

            public function actionView($id) {
                return $this->render('view', ['model' => $this->findModel($id)]);
            }

            public function actionUpdate($id) {
                $model = $this->findModel($id);
                if ($model->type == '1') {
                    $model->scenario = 'update_content';
                    if($model->slug == 'join_carer_help_text' || $model->slug == 'join_family_help_text'){
                        $model->scenario = 'update_content_help_text';
                    }
                } else if ($model->type == '2') {
                    $model->scenario = 'update_image';
                } else if ($model->type == '3') {
                    $model->scenario = 'update_video';
                }
                $data['model'] = $model;
                if (Yii::$app->request->post()) {
                    $model->page_name = $_POST['Cms']['page_name'];
                    if ($model->type == '1') {
                        $model->content = $_POST['Cms']['content'];
                    } else if ($model->type == '2') {
                        $img = \yii\web\UploadedFile::getInstance($model, 'content');
                        if ($img) {
                            $img_path = Yii::$app->basePath . '/web/uploads/frontend/cms/pictures/';
                            $model->content = time() . rand(10, 100) . '.' . $img->extension;
                        } else {
                            $model->content = "";
                        }
                    } else if ($model->type == '3') {
                        $vdo = \yii\web\UploadedFile::getInstance($model, 'content');
                        if ($vdo) {
                            $vdo_path = Yii::$app->basePath . '/web/uploads/frontend/cms/videos/';
                            $model->content = time() . rand(10, 100) . '.' . $vdo->extension;
                        } else {
                            $model->content = "";
                        }
                    }
                    $model_validate = $model->validate();
                    if ($model_validate) {
                        if ($model->type == '2') {
                            $img->saveAs($img_path . $model->content);
                        } else if ($model->type == '3') {
                            $vdo->saveAs($vdo_path . $model->content);
                        }
                        $model->updated_at = date('Y-m-d H:i:s');
                        $model->save(false);
                        Yii::$app->session->setFlash('success', 'Static page details updated successfully.');
                        return $this->refresh();
                    }
                }
                return $this->render('update', $data);
            }

            protected
                    function findModel($id) {
                if (($model = Cms::findOne($id)) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

        }
        