<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Blog;
use app\models\BlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * BlogsController implements the CRUD actions for Blog model.
 */
class BlogsController extends AdminController
{

    /**
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Blog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $original_img_path = $this->findModel($id)->image;

        try {
            $this->findModel($id)->delete();
        }
        catch (exception $err) {
            return $this->redirect(['index']);
        }

        unlink(Yii::$app->basePath . '/web' . $original_img_path);
        unlink(Yii::$app->basePath . '/web' . str_replace('original', 'preview', $original_img_path));
        unlink(Yii::$app->basePath . '/web' . str_replace('original', 'thumb', $original_img_path));
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionBlogimage() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            if (isset($_POST['g'])) {
                $str = file_get_contents("php://input");
                $decoded = urldecode($str);
                $exp = explode(',', $decoded);
                $base64 = array_pop($exp);
                $data = base64_decode($base64);
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randstring = str_shuffle($characters);
                $new_image_name = time() . $this->rand_string(6) . ".jpg";
                $user_temp_image_with_path = Yii::$app->basePath . '/web/uploads/admin/blog/original/' . $new_image_name;
                file_put_contents($user_temp_image_with_path, $data);
                $base_path = Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/admin/blog/';
                Image::getImagine()->open($user_temp_image_with_path)->thumbnail(new Box(350, 550))->save(Yii::$app->basePath . '/web/uploads/admin/blog/preview/' . $new_image_name, ['quality' => 90]);
                Image::getImagine()->open($user_temp_image_with_path)->thumbnail(new Box(180, 250))->save(Yii::$app->basePath . '/web/uploads/admin/blog/thumb/' . $new_image_name, ['quality' => 90]);
                $data_msg['img'] = $new_image_name;
                $data_msg['imgUrlO'] = Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/admin/blog/original/' . $new_image_name;
                $data_msg['imgUrlP'] = Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/admin/blog/preview/' . $new_image_name;
                $data_msg['res'] = 1;
            } else {
                $data_msg['res'] = 0;
            }
            echo json_encode($data_msg);
            exit();
        }
    }
}
