<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Jobs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jobs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'salary')->textInput() ?>
    <?= $form->field($model, 'uid')->textInput() ?>

    <?= "Create date:  ".date("Y-m-d H:i:s", $model->created_at) ?>
    <br>
    <?= "Update date:  ".date("Y-m-d H:i:s", $model->updated_at) ?>
    <br>
    <br>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?php $model->checkedCategoriesId = $model->getCatsIdObjects(); ?>
    <?= $form->field($model, 'checkedCategoriesId')->checkboxList($model->getAllCategories()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
