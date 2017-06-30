<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resume_education".
 *
 * @property integer $idresume_education
 * @property string $education_name
 * @property string $faculty
 * @property integer $resume_idresume
 *
 * @property Resume $resumeIdresume
 */
class ResumeEducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume_education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resume_idresume'], 'required'],
            [['resume_idresume'], 'integer'],
            [['education_name'], 'string', 'max' => 100],
            [['faculty'], 'string', 'max' => 50],
            [['resume_idresume'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::className(), 'targetAttribute' => ['resume_idresume' => 'idresume']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idresume_education' => Yii::t('app', 'Idresume Education'),
            'education_name' => Yii::t('app', 'Education Name'),
            'faculty' => Yii::t('app', 'Faculty'),
            'resume_idresume' => Yii::t('app', 'Resume Idresume'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumeIdresume()
    {
        return $this->hasOne(Resume::className(), ['idresume' => 'resume_idresume']);
    }
}
