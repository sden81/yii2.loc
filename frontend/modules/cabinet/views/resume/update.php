<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Resume */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Resume',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Resumes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->idresume]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="resume-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
