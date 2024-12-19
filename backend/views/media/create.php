<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Media $model */

$this->title = Yii::t('app', 'Create Media');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Media'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
