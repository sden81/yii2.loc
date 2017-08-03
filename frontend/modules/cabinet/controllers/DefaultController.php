<?php

namespace frontend\modules\cabinet\controllers;

use yii\web\Controller;
use common\models\User;

/**
 * Default controller for the `cabinet` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['profile'],
                'lastModified' => function ($action, $params) {
                    $q = new \yii\db\Query();
                    return $q->from('user')->max('updated_at');
                }
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfile()
    {
        $model = \Yii::$app->user->identity;
        $model->scenario = User::SCENARIO_PROFILE;

        if($model->load(\Yii::$app->request->post()) && $model->save()){
            $this->refresh();
        }

        return $this->render("profile",[
            'model'=>$model,
        ]);
    }

    public function actionTest()
    {
        $cache = \Yii::$app->cache;
        echo "3";
        $cache->set("test",1);
        print $cache->get("test");
        exit;
    }
}
