<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Faculties $model */

$this->title = Yii::t('app', 'Update Faculties: {name}', [
    'name' => $model->faculty_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faculties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->faculty_id, 'url' => ['view', 'faculty_id' => $model->faculty_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="faculties-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
