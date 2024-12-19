<?php
namespace backend\models;

use yii\db\ActiveRecord;

class Media extends ActiveRecord
{
public $file; // Fayl yuklash uchun

public static function tableName()
{
return '{{%media}}';
}

public function rules()
{
return [
[['file'], 'file', 'extensions' => 'jpg, png, pdf', 'maxSize' => 10 * 1024 * 1024],
];
}
}

