<?php

use common\models\Faculties;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\FacultiesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Faculties');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculties-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Faculties'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'faculty_id',
            'faculty_name',
            'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Faculties $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'faculty_id' => $model->faculty_id]);
                 }
            ],
        ],
    ]); ?>


</div>
