<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Message;
use app\models\SearchMessage;

class LanguagesController extends AdminController {

    public function columns() {
        $viewMsg = 'View';
        $updateMsg = 'Update';
        $gridColumns = [
                ['class' => 'kartik\grid\SerialColumn'],
                [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'translation',
                'label' => 'Translation Language',
            ],
                [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'urlCreator' => function($action, $model, $key, $index) {
                    switch ($action) {
                        case "view":
                            return Url::to(['languages/view', 'id' => $model->id, 'language' => $model->language]);
                            break;
                        case "update":
                            return Url::to(['languages/update', 'id' => $model->id, 'language' => $model->language]);
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
        $model = new SearchMessage;
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

    public function actionView($id, $language) {
        $model = $this->findModel($id, $language);
        if ($model->language == 'jp') {
            $model->language_temp = 'Japanese';
        }
        return $this->render('view', ['model' => $model]);
    }

    public function actionUpdate($id, $language) {
        $model = $this->findModel($id, $language);
        $model->scenario = 'update';
        $data['model'] = $model;
        $data['language'] = $language;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Language content updated successfully.');
            return $this->refresh();
        }
        if ($model->language == 'jp') {
            $model->language_temp = 'Japanese';
        }
        return $this->render('update', $data);
    }

    protected function findModel($id, $language) {
        if (($model = Message::find()->where(['id' => $id, 'language' => $language])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
