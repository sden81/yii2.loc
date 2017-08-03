<?php

namespace console\controllers;

use common\rbac\components\UserRoleRule;
use Yii;
use yii\console\Controller;

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 09.07.2017
 * Time: 22:17
 */
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); //удаляем старые данные
        //Создаем права для доступа к кабинету
        $cabinet = $auth->createPermission('cabinet');
        $cabinet->description = 'Кабинет';
        //Создадим правило для достуав к админ панели
        $dashboard  = $auth->createPermission('dashboard');
        $dashboard->description = 'Админ-панель';

        $auth->add($dashboard);
        $auth->add($cabinet);

        //Включаем наш обработчик
        $rule = new UserRoleRule();
        $auth->add($rule);

        //Добавляем роли
        $employer =$auth->createRole('employer');
        $employer->description = 'Работодатель';
        $employer->ruleName = $rule->name;
        $auth->add($employer);
        $aspirant = $auth->createRole('aspirant');
        $aspirant->description = 'Соискатель';
        $aspirant->ruleName = $rule->name;
        $auth->add($aspirant);
        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $admin->ruleName = $rule->name;
        $auth->add($admin);

        //Добавляем потомков (это могут быть роли или права)
        $auth->addChild($employer, $cabinet);
        $auth->addChild($aspirant, $cabinet);

        $auth->addChild($admin, $dashboard);
        $auth->addChild($admin, $cabinet);
        $auth->addChild($admin, $aspirant);
        $auth->addChild($admin, $employer);

        $auth->assign($employer, 10);
    }
}