<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property int $teacher_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $hire_date
 * @property string $created_at
 *
 * @property Course[] $courses
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['hire_date', 'created_at'], 'safe'],
            [['first_name', 'last_name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'hire_date' => Yii::t('app', 'Hire Date'),
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
        return $this->hasMany(Course::class, ['teacher_id' => 'teacher_id']);
    }
}
