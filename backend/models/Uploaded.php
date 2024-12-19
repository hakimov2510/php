<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "uploaded".
 *
 * @property int $id
 * @property string $file_name
 * @property string $file_path
 * @property string $uploaded_at
 */
class Uploaded extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploaded';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_name', 'file_path'], 'required'],
            [['uploaded_at'], 'safe'],
            [['file_name', 'file_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'file_name' => Yii::t('app', 'File Name'),
            'file_path' => Yii::t('app', 'File Path'),
            'uploaded_at' => Yii::t('app', 'Uploaded At'),
        ];
    }
}
