<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $student_id
 * @property string $first_name
 * @property string $last_name
 * @property int $group_id
 * @property string|null $date_of_birth
 * @property string|null $email
 * @property string|null $phone
 * @property string $created_at
 *
 * @property Grade[] $grades
 * @property Group $group
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'group_id'], 'required'],
            [['group_id'], 'integer'],
            [['date_of_birth', 'created_at'], 'safe'],
            [['first_name', 'last_name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'unique'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'group_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_id' => Yii::t('app', 'Student ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'group_id' => Yii::t('app', 'Group ID'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Grades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::class, ['student_id' => 'student_id']);
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::class, ['group_id' => 'group_id']);
    }
}
