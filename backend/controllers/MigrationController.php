<?php

namespace backend\controllers;

use common\models\Migration;
use backend\models\MigrationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MigrationController implements the CRUD actions for Migration model.
 */
class MigrationController extends Controller
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
     * Lists all Migration models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MigrationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Migration model.
     * @param string $version Version
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($version)
    {
        return $this->render('view', [
            'model' => $this->findModel($version),
        ]);
    }

    /**
     * Creates a new Migration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Migration();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'version' => $model->version]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Migration model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $version Version
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($version)
    {
        $model = $this->findModel($version);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'version' => $model->version]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Migration model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $version Version
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($version)
    {
        $this->findModel($version)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Migration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $version Version
     * @return Migration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($version)
    {
        if (($model = Migration::findOne(['version' => $version])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
