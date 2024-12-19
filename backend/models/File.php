<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class File extends ActiveRecord
{
    public static function tableName()
    {
        return 'uploaded_files'; // Jadval nomi
    }

    public function rules()
    {
        return [
            [['file_path'], 'required'],
            [['file_path'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file_path' => 'Fayl manzili',
        ];
    }
}
