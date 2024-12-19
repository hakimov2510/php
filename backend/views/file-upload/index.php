<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $files common\models\File[] */

$this->title = 'Yuklangan Fayllar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="file-upload-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <ul>
        <?php foreach ($files as $file): ?>
            <li>
                <?= Html::encode($file->file_path) ?>
                - <?= Html::a('Yuklash', ['/uploads/' . $file->file_path], ['target' => '_blank']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
