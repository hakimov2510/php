<?php

use common\models\Groups;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\GroupsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groups-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Groups'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'group_id',
            'group_name',
            'faculty_id',
            'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Groups $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'group_id' => $model->group_id]);
                 }
            ],
        ],
    ]); ?>


</div>
