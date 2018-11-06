<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\data\Pagination;
use app\models\UserMaster;

use app\models\Comment;
use app\models\CommentSearch;
use yii\filters\VerbFilter;


class CommentsController extends AdminController {
   
    /**
     * Lists all Comment models.
     * @return mixed
     **/
    public function actionIndex() {
    	$searchModel = new CommentSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
        	'searchModel' => $searchModel,
        	'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Delete Comment
     * @param $id
     * @redirect comments/index
     **/
    public function actionDelete($id) {
    	$comment = new Comment();
    	if($comment->findOne($id)->delete()) {
    		return $this->redirect(Url::toRoute('comments/index'));
    	}
    }
    /**
     * Allow Comment
     * @param $id
     * @redirect comments/index
     **/
    public function actionAllow($id) {
    	$comment = Comment::findOne($id);

    	$comment->status = 1;

    	if ($comment->save()) {
	    	return $this->redirect(Url::toRoute('comments/index'));
    	}
    }

    /**
     * DisAllow Comment
     * @param $id
     * @redirect comments/index
     **/
    public function actionDisallow($id) {
    	$comment = Comment::findOne($id);

    	$comment->status = 0;

    	if ($comment->save()) {
	    	return $this->redirect(Url::toRoute('comments/index'));
    	}
    }

    /**
     * Cancel Reported on the Comment
     * @param $id
     * @redirect comments/cancelReport?id=
     **/
    public function actionCancelreport($id) {
        $comment = Comment::findOne($id);

        $comment->reported = 0;

        if ($comment->save()) {
            return $this->redirect(Url::toRoute('comments/index'));
        }
    }

}
