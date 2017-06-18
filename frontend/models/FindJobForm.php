<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 11.06.2017
 * Time: 9:49
 */

namespace frontend\models;

use yii\base\Model;

class FindJobForm extends Model
{
    public $what;
    public $where;

    public function rules()
    {
        return [
            [['what', 'where'], 'string', 'min' => 3],
        ];
    }

    public function attributeLabels()
    {
        return [
            'what' => 'MyWhat',
            'where' => 'MyWhere',
        ];
    }

    public function findJob()
    {

    }
}
