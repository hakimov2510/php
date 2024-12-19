<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\GradeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="grade-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'grade_id') ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'grade') ?>

    <?= $form->field($model, 'grade_date') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
