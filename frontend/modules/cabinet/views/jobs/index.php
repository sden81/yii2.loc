<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\JobsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jobs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Jobs'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idjobs',
            'company_name',
            'title',
            'description:ntext',
            //'location',
            //'salary',
            // 'uid',
            //'created_at:date',
            [
                'attribute' => 'created_at',
                'content' => function ($data){
                    return date("Y-m-d",$data->created_at);
                },
                'filter'=> \yii\jui\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute'=>'created_at',
                    'dateFormat' =>'yyyy-MM-dd',
                    'options'=>['class'=>'form-control']
                ]),
            ],

            //'updated_at:date',
            //'address:ntext',
            ['attribute' => 'categories',
                'label' => 'Categories',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['class' => 'name'];
                },
                'content' => function ($data) {
                    return implode(' , ', $data->checkedCategoryNames);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
