<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobs_cats_relation".
 *
 * @property integer $fk_id_cats
 * @property integer $jobs_idjobs
 *
 * @property Jobs $jobsIdjobs
 */
class JobsCatsRelation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobs_cats_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_id_cats', 'jobs_idjobs'], 'required'],
            [['fk_id_cats', 'jobs_idjobs'], 'integer'],
            [['jobs_idjobs'], 'exist', 'skipOnError' => true, 'targetClass' => Jobs::className(), 'targetAttribute' => ['jobs_idjobs' => 'idjobs']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fk_id_cats' => Yii::t('app', 'Fk Id Cats'),
            'jobs_idjobs' => Yii::t('app', 'Jobs Idjobs'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobsIdjobs()
    {
        return $this->hasOne(Jobs::className(), ['idjobs' => 'jobs_idjobs']);
    }
}
