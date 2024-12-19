<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Students $model */

$this->title = Yii::t('app', 'Update Students: {name}', [
    'name' => $model->student_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_id, 'url' => ['view', 'student_id' => $model->student_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="students-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
