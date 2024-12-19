<?php

use common\models\Migration;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\MigrationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Migrations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="migration-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Migration'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'version',
            'apply_time:datetime',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Migration $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'version' => $model->version]);
                 }
            ],
        ],
    ]); ?>


</div>
