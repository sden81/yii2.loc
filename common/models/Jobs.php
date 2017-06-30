<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobs".
 *
 * @property integer $idjobs
 * @property string $company_name
 * @property string $title
 * @property string $description
 * @property string $location
 * @property integer $salary
 * @property integer $uid
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $address
 *
 * @property JobsCatsRelation[] $jobsCatsRelations
 */
class Jobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'address'], 'string'],
            [['salary', 'uid', 'created_at', 'updated_at'], 'integer'],
            [['company_name'], 'string', 'max' => 50],
            [['title', 'location'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idjobs' => Yii::t('app', 'Idjobs'),
            'company_name' => Yii::t('app', 'Company Name'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'location' => Yii::t('app', 'Location'),
            'salary' => Yii::t('app', 'Salary'),
            'uid' => Yii::t('app', 'Uid'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'address' => Yii::t('app', 'Address'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobsCatsRelations()
    {
        return $this->hasMany(JobsCatsRelation::className(), ['jobs_idjobs' => 'idjobs']);
    }
}
