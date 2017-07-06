<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Jobs */

$this->title = Yii::t('app', 'Create Jobs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
