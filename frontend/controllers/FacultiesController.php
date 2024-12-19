<?php

namespace frontend\controllers;

use common\models\Faculties;
use frontend\models\FacultiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FacultiesController implements the CRUD actions for Faculties model.
 */
class FacultiesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Faculties models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FacultiesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Faculties model.
     * @param int $faculty_id Faculty ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($faculty_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($faculty_id),
        ]);
    }

    /**
     * Creates a new Faculties model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Faculties();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'faculty_id' => $model->faculty_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Faculties model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $faculty_id Faculty ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($faculty_id)
    {
        $model = $this->findModel($faculty_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'faculty_id' => $model->faculty_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Faculties model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $faculty_id Faculty ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($faculty_id)
    {
        $this->findModel($faculty_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Faculties model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $faculty_id Faculty ID
     * @return Faculties the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($faculty_id)
    {
        if (($model = Faculties::findOne(['faculty_id' => $faculty_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
