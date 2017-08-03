<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 23.07.2017
 * Time: 10:37
 */

namespace frontend\components\AuthClients;


use yii\helpers\ArrayHelper;

class Facebook extends \yii\authclient\clients\Facebook
{
    public function image($attribute)
    {
        return "http://graph.facebook.com/" . $attribute['id'] . "/picture?width=250";
    }

    protected function defaultNormalizeUserAttributeMap()
    {
        return ArrayHelper::merge(parent::defaultNormalizeUserAttributeMap(),
            [
                'login' => 'email',
                'photo' => [$this, 'image']
            ]
        );
    }
}