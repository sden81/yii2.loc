<?php

namespace frontend\components\AuthClients;

use yii\authclient\clients\VKontakte;
use yii\helpers\ArrayHelper;

class vk extends VKontakte
{
    protected function defaultNormalizeUserAttributeMap()
    {
        return ArrayHelper::merge(parent::defaultNormalizeUserAttributeMap(),
    [
        'login' => 'screen_name'
    ]);
}
}