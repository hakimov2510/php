<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Grade $model */

$this->title = Yii::t('app', 'Update Grade: {name}', [
    'name' => $model->grade_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->grade_id, 'url' => ['view', 'grade_id' => $model->grade_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="grade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
