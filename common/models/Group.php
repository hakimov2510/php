<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property int $group_id
 * @property string $group_name
 * @property int $faculty_id
 * @property string $created_at
 *
 * @property Faculty $faculty
 * @property Student[] $students
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_name', 'faculty_id'], 'required'],
            [['faculty_id'], 'integer'],
            [['created_at'], 'safe'],
            [['group_name'], 'string', 'max' => 50],
            [['group_name'], 'unique'],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::class, 'targetAttribute' => ['faculty_id' => 'faculty_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => Yii::t('app', 'Group ID'),
            'group_name' => Yii::t('app', 'Group Name'),
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
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::class, ['group_id' => 'group_id']);
    }
}
