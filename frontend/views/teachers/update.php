<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Teachers $model */

$this->title = Yii::t('app', 'Update Teachers: {name}', [
    'name' => $model->teacher_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teachers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->teacher_id, 'url' => ['view', 'teacher_id' => $model->teacher_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="teachers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
