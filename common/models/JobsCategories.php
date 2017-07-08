<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobs_categories".
 *
 * @property integer $idjobs_categories
 * @property string $category
 */
class JobsCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'jobs_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idjobs_categories' => Yii::t('app', 'Idjobs Categories'),
            'category' => Yii::t('app', 'Category'),
        ];
    }
}
