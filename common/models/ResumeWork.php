<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resume_work".
 *
 * @property integer $idresume_work
 * @property string $company_name
 * @property string $description
 * @property string $date_job
 * @property integer $resume_idresume
 *
 * @property Resume $resumeIdresume
 */
class ResumeWork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume_work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['resume_idresume'], 'required'],
            [['resume_idresume'], 'integer'],
            [['company_name', 'date_job'], 'string', 'max' => 50],
            [['resume_idresume'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::className(), 'targetAttribute' => ['resume_idresume' => 'idresume']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idresume_work' => Yii::t('app', 'Idresume Work'),
            'company_name' => Yii::t('app', 'Company Name'),
            'description' => Yii::t('app', 'Description'),
            'date_job' => Yii::t('app', 'Date Job'),
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
