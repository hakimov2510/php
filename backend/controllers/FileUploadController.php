<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use common\models\File; // Faylni saqlash uchun model
use yii\web\NotFoundHttpException;

class FileUploadController extends Controller
{
    public function actionCreate()
    {
        $model = new File();

        if ($model->load(Yii::$app->request->post())) {
            // Faylni olish
            $file = UploadedFile::getInstance($model, 'file');
            if ($file) {
                // Faylni serverga saqlash
                $filePath = 'uploads/' . $file->baseName . '.' . $file->extension;
                $file->saveAs(Yii::getAlias('@webroot') . '/' . $filePath);
                $model->file_path = $filePath;
            }

            // Modelni saqlash
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Fayl muvaffaqiyatli yuklandi!');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionIndex()
    {
        $files = File::find()->all();
        return $this->render('index', ['files' => $files]);
    }
}
