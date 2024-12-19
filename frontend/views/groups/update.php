<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Groups $model */

$this->title = Yii::t('app', 'Update Groups: {name}', [
    'name' => $model->group_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_id, 'url' => ['view', 'group_id' => $model->group_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
