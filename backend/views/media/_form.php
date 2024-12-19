<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Media $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filepath')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filetype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uploaded_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
