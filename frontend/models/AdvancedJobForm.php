<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 13.06.2017
 * Time: 21:00
 */

namespace frontend\models;

use yii\base\Model;

class AdvancedJobForm extends Model
{
    public $whithAllOfTheseWords;
    public $withTheExactPhrase;
    public $jobTypes;
    public $radius;
    public $where;
    public $jobAge;
    public $displayCount;

    public function rules()
    {
        return [
            [['whithAllOfTheseWords', 'withTheExactPhrase', 'where'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'whithAllOfTheseWords' => 'With all of these words',
            'withTheExactPhrase' => 'With the exact phrase',
            'jobTypes' => 'Show jobs of type',
            'where' => 'Of',
            'jobAge' => 'Age - Jobs published',
            'displayCount' => 'Display',
        ];
    }
}