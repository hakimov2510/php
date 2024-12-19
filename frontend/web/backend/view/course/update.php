<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Course $model */

$this->title = Yii::t('app', 'Update Course: {name}', [
    'name' => $model->course_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->course_id, 'url' => ['view', 'course_id' => $model->course_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>