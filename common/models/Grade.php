<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grades".
 *
 * @property int $grade_id
 * @property int $student_id
 * @property int $course_id
 * @property string|null $grade
 * @property string|null $grade_date
 * @property string $created_at
 *
 * @property Course $course
 * @property Student $student
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'course_id'], 'required'],
            [['student_id', 'course_id'], 'integer'],
            [['grade_date', 'created_at'], 'safe'],
            [['grade'], 'string', 'max' => 2],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['student_id' => 'student_id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'course_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grade_id' => Yii::t('app', 'Grade ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'grade' => Yii::t('app', 'Grade'),
            'grade_date' => Yii::t('app', 'Grade Date'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['course_id' => 'course_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['student_id' => 'student_id']);
    }
}
