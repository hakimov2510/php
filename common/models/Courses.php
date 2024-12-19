<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $course_id
 * @property string $course_name
 * @property string|null $description
 * @property int $teacher_id
 * @property int $faculty_id
 * @property string $created_at
 *
 * @property Faculty $faculty
 * @property Grade[] $grades
 * @property Teacher $teacher
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_name', 'teacher_id', 'faculty_id'], 'required'],
            [['description'], 'string'],
            [['teacher_id', 'faculty_id'], 'integer'],
            [['created_at'], 'safe'],
            [['course_name'], 'string', 'max' => 100],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::class, 'targetAttribute' => ['teacher_id' => 'teacher_id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::class, 'targetAttribute' => ['faculty_id' => 'faculty_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'course_id' => Yii::t('app', 'Course ID'),
            'course_name' => Yii::t('app', 'Course Name'),
            'description' => Yii::t('app', 'Description'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Faculty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::class, ['faculty_id' => 'faculty_id']);
    }

    /**
     * Gets query for [[Grades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::class, ['course_id' => 'course_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::class, ['teacher_id' => 'teacher_id']);
    }
}
