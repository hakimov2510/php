<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Migration $model */

$this->title = Yii::t('app', 'Update Migration: {name}', [
    'name' => $model->version,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Migrations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->version, 'url' => ['view', 'version' => $model->version]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="migration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
