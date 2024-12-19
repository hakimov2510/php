<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faculties".
 *
 * @property int $faculty_id
 * @property string $faculty_name
 * @property string $created_at
 *
 * @property Course[] $courses
 * @property Group[] $groups
 */
class Faculties extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faculties';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['faculty_name'], 'required'],
            [['created_at'], 'safe'],
            [['faculty_name'], 'string', 'max' => 100],
            [['faculty_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'faculty_name' => Yii::t('app', 'Faculty Name'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::class, ['faculty_id' => 'faculty_id']);
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::class, ['faculty_id' => 'faculty_id']);
    }
}
