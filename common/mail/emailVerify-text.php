<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Hello <?= $user->username ?>,

Elektron pochtangizni tasdiqlash uchun quyidagi havolaga o'ting:

<?= $verifyLink ?>
