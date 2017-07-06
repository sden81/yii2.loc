<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "resume".
 *
 * @property integer $idresume
 * @property string $title
 * @property string $skills
 * @property integer $uid
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $counter
 *
 * @property ResumeEducation[] $resumeEducations
 * @property ResumeWork[] $resumeWorks
 */
class Resume extends \yii\db\ActiveRecord
{
    public $educationName;
    public $faculty;
    public $companyName;
    public $description;
    public $dateJobTo;
    public $dateJobFrom;
    protected $valueBlock;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'skills'], 'required'],
            [['educationName', 'faculty', 'companyName', 'description'], 'each', 'rule' => ['string']],
            [['dateJobTo', 'dateJobFrom'], 'each', 'rule' => ['date', 'format' => 'php:Y-m-d']],
            [['skills'], 'string'],
            [['uid', 'created_at', 'updated_at', 'counter'], 'integer'],
            [['title'], 'string', 'max' => 100],
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
            'idresume' => Yii::t('app', 'Idresume'),
            'title' => Yii::t('app', 'Title'),
            'skills' => Yii::t('app', 'Skills'),
            'uid' => Yii::t('app', 'Uid'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function afterValidate()
    {
        parent::afterValidate();

        $this->uid = Yii::$app->user->id;
    }

    protected function loadData(string $var, array $relation, string $relationField, array $appendix_for_date = null)
    {
        $tmp = $this->$var;
        $tmp = $tmp ?? array_map(function ($row) use ($relationField, $appendix_for_date) {
                //в базе дата начала и окончания перечислены черех пробел
                //$appendix_for_date['разделитель','индекс']
                if ($appendix_for_date === null)
                    return $row->$relationField;
                $tmp_array = explode($appendix_for_date[0], $row->$relationField);
                return $tmp_array[$appendix_for_date[1]];
            }, $relation);
        return $tmp;
    }

    public function afterFind()
    {
        parent::afterFind();

        if (!$this->isNewRecord && !Yii::$app->request->isPost) {
            $resumeRelation = $this->resumeEducations;
            $workRelation = $this->resumeWorks;
            $this->educationName = $this->loadData("educationName", $resumeRelation, "education_name");
            $this->faculty = $this->loadData("faculty", $resumeRelation, "faculty");
            $this->companyName = $this->loadData("description", $workRelation, "company_name");
            $this->description = $this->loadData("description", $workRelation, "description");
            $this->dateJobTo = $this->loadData("dateJobTo", $workRelation, "date_job", [' ', 0]);
            $this->dateJobFrom = $this->loadData("dateJobFrom", $workRelation, "date_job", [' ', 1]);
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if (!empty($this->educationName)) {
            ResumeEducation::deleteAll(['resume_idresume' => $this->idresume]);
            $educationModel = new ResumeEducation;
            $rows = [];

            foreach ($this->educationName as $i => $education) {
                $faculty = $this->faculty[$i];
                $rows[] = ['idresume_education' => null, 'education_name' => $education, 'faculty' => $faculty, 'resume_idresume' => $this->idresume];
            }
            Yii::$app->db->createCommand()->batchInsert(ResumeEducation::tableName(), $educationModel->attributes(), $rows)->execute();
        }

        if (!empty($this->companyName)) {
            ResumeWork::deleteAll(['resume_idresume' => $this->idresume]);
            $workModel = new ResumeWork;
            $rows = [];
            foreach ($this->companyName as $i => $company) {
                $description = $this->description[$i];
                $date_job_from = $this->dateJobFrom[$i];
                $date_job_to = $this->dateJobTo[$i];
                $rows[] = ['idresume_work' => null, 'company_name' => $company, 'description' => $description, 'date_job' => $date_job_to . " " . $date_job_from, "resume_id" => $this->idresume];
            }
            Yii::$app->db->createCommand()->batchInsert(ResumeWork::tableName(), $workModel->attributes(), $rows)->execute();
        }
    }

    public function setWorkCompanyBlock()
    {
        $this->valueBlock = $this->companyName ?? $this->description ?? $this->dateJobTo ?? $this->dateJobFrom ?? '';
    }

    public function setEducationBlock()
    {
        $this->valueBlock = $this->educationName ?? $this->faculty ?? '';
    }

    public function getValueBlock()
    {
        return $this->valueBlock;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumeEducations()
    {
        return $this->hasMany(ResumeEducation::className(), ['resume_idresume' => 'idresume']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumeWorks()
    {
        return $this->hasMany(ResumeWork::className(), ['resume_idresume' => 'idresume']);
    }
}
