<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\ResumeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Resumes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Resume'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idresume',
            [
                'attribute' => 'title',
                'label' => 'Название',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['class' => 'name'];
                },
                'content' => function ($data) {
                    return "<b>" . $data->title . "</b>";
                }
            ],
            'skills:ntext',
            'uid',
            'created_at:date',
            //'updated_at',
            //'counter',

            ['attribute' => 'educationName',
                'label' => 'Education',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['class' => 'name'];
                },
                'content' => function ($data) {
                    return implode(' , ', $data->educationName);
                }
            ],

            ['attribute' => 'companyName',
                'label' => 'Companies',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['class' => 'name'];
                },
                'content' => function ($data) {
                    return implode(' , ', $data->companyName);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
