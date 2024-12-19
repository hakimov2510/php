<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Uploaded $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="uploaded-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'file_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uploaded_at')->textInput() ?>

<!--    --><?php //= $form->field($model, 'uploaded_at')->fieInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
