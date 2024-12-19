<?php

use common\models\Course;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\CourseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Course'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'course_id',
            'course_name',
            'description:ntext',
            'teacher_id',
            'faculty_id',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Course $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'course_id' => $model->course_id]);
                 }
            ],
        ],
    ]); ?>


</div>
