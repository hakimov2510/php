<?php
namespace backend\controllers;

use Yii;
use yii\web\UploadedFile;
use backend\models\Media;
use yii\web\Controller;

class MediaController extends Controller
{
    public function actionCreate()
    {
        $model = new Media();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file && $model->validate()) {
                $filePath = 'uploads/' . uniqid() . '.' . $model->file->extension;
                if ($model->file->saveAs($filePath)) {
                    $model->filename = $model->file->baseName;
                    $model->filepath = $filePath;
                    $model->filetype = $model->file->extension;
                    $model->uploaded_at = date('Y-m-d H:i:s');
                    $model->save();

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', ['model' => $model]);
    }
}
