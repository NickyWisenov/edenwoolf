<?php

namespace app\controllers;

use app\modules\admin\modules\settings\models\Settings;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use app\models\Blog;
use app\models\Comment;
use app\models\Category;
use yii\data\Pagination;

use yii\log\Logger;

class BlogsController extends FrontController {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'category', 'view', 'comment', 'report', 'like'],
                    ],
                ],
            ],
        ];
    }

    public function actions() { 
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Index Function
     **/
    public function actionIndex() {
        
    	$query = Blog::find()->indexBy('id')->orderBy(['created_at' => SORT_DESC]);
    	
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count()
        ]);

        $page=1;

        if(isset($_GET["page"])) $page=$_GET["page"];

        $limit = 6;
        $offset = (int)($limit * ($page-1));

        $pageSize = (int)ceil($countQuery->count()/$limit);

        $pages->setPageSize($limit);

        $blogs = $query->offset($offset)
            ->limit($limit)
            ->all();

        return $this->render('index', [
             'blogs' => $blogs,
             'pages' => $pages,
             'category' => null
        ]);
    }   

    public function actionCategory() {
        $request = Yii::$app->request;
        
        $query = Blog::find()->where(['category_id' => $request->get('id')]);

        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count()
        ]);

        $page=1;

        if(isset($_GET["page"])) $page=$_GET["page"];

        $limit = 6;
        $offset = $limit*($page-1);


        $pageSize = (int)ceil($countQuery->count()/$limit);
        $pages->setPageSize($limit);

        $blogs = $query->offset($offset)
            ->limit($limit)
            ->all();

        return $this->render('index', [
             'blogs' => $blogs,
             'pages' => $pages,
             'category' => Category::findOne($request->get('id'))->category_name
        ]);
    }

    public function actionView($id) {
        $blog = Blog::findOne($id);
        if ($blog) {
            return $this->render("view", [
                'blog' => $blog,
            ]);
        }
        return $this->redirect(['blogs/index']);
        
    }
}