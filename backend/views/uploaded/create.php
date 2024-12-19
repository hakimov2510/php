<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Uploaded $model */

$this->title = Yii::t('app', 'Create Uploaded');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Uploadeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uploaded-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
