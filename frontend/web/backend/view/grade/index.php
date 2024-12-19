<?php

use common\models\Grade;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\GradeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Grades');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Grade'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'grade_id',
            'student_id',
            'course_id',
            'grade',
            'grade_date',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Grade $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'grade_id' => $model->grade_id]);
                 }
            ],
        ],
    ]); ?>


</div>
