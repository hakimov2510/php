<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Groups $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'faculty_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
