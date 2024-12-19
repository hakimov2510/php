<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property int $id
 * @property string $filename
 * @property string $filepath
 * @property string $filetype
 * @property string $uploaded_at
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * {@inheritdoc}
     */
    public $file; // Fayl yuklash uchun vaqtinchalik o'zgaruvchi

    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'jpg, png, pdf', 'maxSize' => 10 * 1024 * 1024],
            [['filename', 'filepath', 'filetype'], 'string'],
            [['uploaded_at'], 'safe'],
        ];
    }


    /**
     * {@inheritdoc}
     */

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'filename' => Yii::t('app', 'Filename'),
            'filepath' => Yii::t('app', 'Filepath'),
            'filetype' => Yii::t('app', 'Filetype'),
            'uploaded_at' => Yii::t('app', 'Uploaded At'),
        ];
    }
}
