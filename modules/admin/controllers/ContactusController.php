<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\ContactUs;
use app\models\SearchContactUs;

class ContactusController extends AdminController {

    public function columns() {
        $viewMsg = 'View';
        $updateMsg = 'Update';
        $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'name',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'email',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'phone_no',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'created_at',
            ],
            [
//                'header' => 'Reply status',
                'attribute' => 'reply_status',
                'value' => function($data) {
                    return ($data->reply_status == 0) ? 'Not Replied' : 'Replied';
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(array('0' => array('id' => '0', 'reply_status' => 'Not Replied'), '1' => array('id' => '1', 'reply_status' => 'Replied')), 'id', 'reply_status'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                    'options' => ['multiple' => false],
                ],
                'filterInputOptions' => ['placeholder' => 'Select']
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'urlCreator' => function($action, $model, $key, $index) {
                    switch ($action) {
                        case "view":
                            return Url::to(['contactus/view', 'id' => $model->id]);
                            break;
                        case "update":
                            return Url::to(['contactus/update', 'id' => $model->id]);
                            break;
                    }
                },
                        'template' => '{view} {reply}',
                        'viewOptions' => ['title' => $viewMsg, 'data-toggle' => 'tooltip'],
                        'updateOptions' => ['title' => $updateMsg, 'data-toggle' => 'tooltip'],
                        'buttons' => [
                            'reply' => function ($url, $model, $key) {
                                return Html::a('<span class="fa fa-reply"></span>', Url::to(['contactus/reply', 'id' => $model->id]), ['title' => Yii::t('app', 'Reply')]);
                            },
                                ],
                            ]
                        ];
                        return $gridColumns;
                    }

                    public function actionIndex() {
                        $model = new SearchContactUs;
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

                    public function actionReply($id) {
                        $model = $this->findModel($id);
                        $model->scenario = 'contact_reply';
                        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                            $email_setting = $this->get_email_data('contact_us_reply', array('NAME' => $model->name, 'MESSAGE' => $model->message, 'REPLY' => $model->reply_message));
                            $email_data = [
                                'to' => $model->email,
                                'subject' => $email_setting['subject'],
                                'template' => 'admin_reply_contact',
                                'data' => ['message' => $email_setting['body']]
                            ];
                            $this->SendMail($email_data);
                            $model->reply_status = '1';
                            $model->updated_at = date('Y-m-d H:i:s');
                            $model->save(false);
                            Yii::$app->session->setFlash('success', 'Reply sent successfully.');
                            return $this->redirect(Url::toRoute('contactus/index'));
                        }
                        return $this->render('update', ['model' => $model]);
                    }

                    protected function findModel($id) {
                        if (($model = ContactUs::findOne($id)) !== null) {
                            return $model;
                        } else {
                            throw new NotFoundHttpException('The requested page does not exist.');
                        }
                    }

                }
                