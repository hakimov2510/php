<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Teachers $model */

$this->title = Yii::t('app', 'Create Teachers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teachers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
