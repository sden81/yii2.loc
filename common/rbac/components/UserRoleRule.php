<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 09.07.2017
 * Time: 22:53
 */

namespace common\rbac\components;

use Yii;
use yii\rbac\Rule;
use common\models\User;

class UserRoleRule extends Rule
{
public $name = 'userRole';

public function execute($user, $item, $params)
{
    if(!Yii::$app->user->isGuest){
        return (Yii::$app->user->identity->status == User::STATUS_ACTIVE);
    }
    return false;
}

}