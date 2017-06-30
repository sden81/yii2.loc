<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Resume */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="resume-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skills')->textarea(['rows' => 6]) ?>

    <fieldset class="education">
        <legend class="education">Education</legend>
        <div class="root">
            <?php
            $model->setEducationBlock();
            $value = $model->getValueBlock();
            if ($value) {
                foreach (range(0, count($value) - 1) as $i) {
                    $educationName = $model->educationName[$i];
                    $faculty = $model->faculty[$i];
                    ?>
                    <div class="block">
                        <?= $form->field($model, 'educationName[]')->textInput(['maxlength' => true, 'value' => $educationName]) ?>
                        <?= $form->field($model, 'faculty[]')->textInput(['maxlength' => true, 'value' => $faculty]) ?>
                        <hr>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="block">
                    <?= $form->field($model, 'educationName[]')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'faculty[]')->textInput(['maxlength' => true]) ?>
                    <hr>
                </div>
                <?php
            }
            ?>
        </div>
        <?= Html::button("Add block", ['class' => 'bnt btn-primary add']) ?>
        <br><br>
    </fieldset>

    <fieldset class="work">
        <legend class="work">Work Experience</legend>
        <div class="root">
            <?php
            $model->setWorkCompanyBlock();
            $value = $model->getValueBlock();
            if ($value) {
                foreach (range(0, count($value) - 1) as $i) {
                    $companyName = $model->companyName[$i];
                    $description = $model->description[$i];
                    $dateJobTo = $model->dateJobTo[$i];
                    $dateJobFrom = $model->dateJobFrom[$i];
                    ?>
                    <div class="block">
                        <?= $form->field($model, 'companyName[]')->textInput(['maxlength' => true, 'value' => $companyName]) ?>
                        <?= $form->field($model, 'description[]')->textarea(['rows' => true, 'value' => $description]) ?>
                        <div class="row">
                            <div class="col-xs-6 col-sm-2">
                                <?= $form->field($model, "dateJobTo[$i]")->widget(DatePicker::classname(), [
                                    'dateFormat' => 'y-MM-dd',
                                    'options' => ['class' => 'datepicker form-control'],
                                    'clientOptions' => [
                                        'yearRange' => '2000:2016',
                                        'changeMonth' => 'true',
                                        'changeYear' => 'true',
                                        'firstDay' => '1',
                                    ]]) ?>
                            </div>
                            <div class="col-xs-6 col-sm-2">
                                <?= $form->field($model, 'dateJobFrom[]')->textInput(['value' => $dateJobFrom,'class' => 'datepicker form-control','maxlength' => true]) ?>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <?php
                }
            } else {
                ?>
                <div class="block">
                    <?= $form->field($model, 'companyName[]')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'description[]')->textarea(['rows' => true]) ?>
                    <div class="row">
                        <div class="col-xs-6 col-sm-2">
                            <?= $form->field($model, "dateJobTo[]")->widget(DatePicker::classname(), [
                                'dateFormat' => 'y-MM-dd',
                                'options' => ['class' => ''],
                                'clientOptions' => [
                                    'yearRange' => '2000:2016',
                                    'changeMonth' => 'true',
                                    'changeYear' => 'true',
                                    'firstDay' => '1',
                                ]]) ?>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <?= $form->field($model, 'dateJobFrom[]')->textInput(['class' => 'datepicker form-control','maxlength' => true]) ?>
                        </div>
                        <hr>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?= Html::button("Add block", ['class' => 'bnt btn-primary add']) ?>
        <br><br>
    </fieldset>

    <?= Html::button("Test button", ['class' => 'my_test_button']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?php
//$this->registerJsFile('/js/my_func.js',  ['position' => yii\web\View::POS_HEAD]);
?>
