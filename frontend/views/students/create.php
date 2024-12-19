<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Students $model */

$this->title = Yii::t('app', 'Create Students');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
