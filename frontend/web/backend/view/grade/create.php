<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Grade $model */

$this->title = Yii::t('app', 'Create Grade');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
