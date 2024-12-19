<?php

namespace frontend\controllers;

use common\models\Groups;
use frontend\models\GroupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupsController implements the CRUD actions for Groups model.
 */
class GroupsController extends Controller
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
     * Lists all Groups models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GroupsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Groups model.
     * @param int $group_id Group ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($group_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($group_id),
        ]);
    }

    /**
     * Creates a new Groups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Groups();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'group_id' => $model->group_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Groups model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $group_id Group ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($group_id)
    {
        $model = $this->findModel($group_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'group_id' => $model->group_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Groups model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $group_id Group ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($group_id)
    {
        $this->findModel($group_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Groups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $group_id Group ID
     * @return Groups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($group_id)
    {
        if (($model = Groups::findOne(['group_id' => $group_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
