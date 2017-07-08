<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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

    public $categories;

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

    public function behaviors()
    {
        return [TimestampBehavior::className(),];
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

    protected function loadData(string $var, array $relation, string $relationField)
    {
        $tmp = $this->$var;
        $tmp = $tmp ?? array_map(function ($row) use ($relationField) {
                    return $row->$relationField;
            }, $relation);
        return $tmp;
    }

    public function afterFind()
    {
        parent::afterFind();

        if (!$this->isNewRecord && !Yii::$app->request->isPost) {
            $catsRealation  = $this->cats;
            $this->categories = $this->loadData("categories", $catsRealation, "category");
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobsCatsRelations()
    {
        return $this->hasMany(JobsCatsRelation::className(), ['jobs_idjobs' => 'idjobs']);
    }

    public function getCats()
    {
        //https://stackoverflow.com/questions/26763298/how-do-i-work-with-many-to-many-relations-in-yii2
        //http://www.yiiframework.com/doc-2.0/guide-db-active-record.html
        return $this->hasMany(JobsCategories::className(), ['idjobs_categories' => 'jobs_idcats'])
            ->viaTable('jobs_cats_relation', ['jobs_idjobs' => 'idjobs']);
    }

}
