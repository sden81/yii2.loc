<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Home';
?>
<div class="hero-header">
    <div class="inner-hero-header">
        <div class="container">
            <div class="text-center logo"><a href="<?= \yii\helpers\Url::home() ?>"><img src="/images/logo.png"
                                                                                         alt=""></a></div>
            <div class="relative">
                <i class="fa fa-globe ic-fade-globe"></i>
                <!-- form search -->
                <?php $form = ActiveForm::begin(['id' => 'form-search', 'action'=>['site/find']]); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'what')->textInput(['autofocus' => true, 'class' => 'form-control input-lg', 'placeholder' => 'job title, keywords or company name']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'where')->textInput(['autofocus' => true, 'class' => 'form-control input-lg', 'placeholder' => 'city, province, or region']); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Find a Jobs', ['class' => 'btn btn-t-primary btn-lg btn-theme btn-pill btn-block']) ?>
                </div>
                <div class="text-center">
                    <a href="#modal-advanced" data-toggle="modal">Advanced Job Search</a>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<!-- modal Advanced search -->
<div class="modal fade" id="modal-advanced">
    <div class="modal-dialog ">
        <div class="modal-content">
            <?php $form = ActiveForm::begin(['id' => 'advanced-find-job-form']); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Advanced Job Search</h4>
            </div>
            <div class="modal-body">
                <h5>Find Jobs</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($advancedJobModel, 'whithAllOfTheseWords')->textInput(['autofocus' => true, 'class' => 'form-control', 'name' => 'text']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($advancedJobModel, 'withTheExactPhrase')->textInput(['autofocus' => true, 'class' => 'form-control', 'name' => 'text']); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?= $form->field($advancedJobModel, 'jobTypes')
                        ->dropDownList([
                            'all' => 'All job types',
                            'fulltime' => 'Full-time',
                            'parttime' => 'Part-time',
                            'contract' => 'Contract',
                            'internship' => 'Internship',
                            'temporary' => 'Temporary',
                        ],
                            [
                                'class' => 'form-control'
                            ]); ?>
                </div>
                <div class="white-space-10"></div>
                <h5>Where and When</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($advancedJobModel, 'radius')
                                ->dropDownList([
                                    '0' => 'only in',
                                    '5' => 'within 5 kilometers',
                                    '10' => 'within 10 kilometers',
                                    '15' => 'within 15 kilometers',
                                    '25' => 'within 25 kilometers',
                                    '50' => 'within 50 kilometers',
                                ],
                                    [
                                        'class' => 'form-control',
                                        'options'=>['25'=>['Selected'=>true]]
                                    ]); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($advancedJobModel, 'where')->textInput(['autofocus' => true, 'class' => 'form-control', 'maxlength' => '250', 'value' => 'United States']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($advancedJobModel, 'jobAge')
                                ->dropDownList([
                                    'any' => 'anytime',
                                    '15' => 'within 15 days',
                                    '7' => 'within 7 days',
                                    '3' => 'within 3 days',
                                    '1' => 'since yesterday',
                                    'last' => 'since my last visit',
                                ],
                                    [
                                        'class' => 'form-control',
                                        'options'=>['3'=>['Selected'=>true]]
                                    ]); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($advancedJobModel, 'displayCount')
                                ->dropDownList([
                                    '10' => '10',
                                    '20' => '20',
                                    '30' => '30',
                                    '50' => '50',
                                ],
                                    [
                                        'class' => 'form-control',
                                        'options'=>['10'=>['Selected'=>true]]
                                    ]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-theme" data-dismiss="modal">Close</button>
                <?= Html::submitButton('Find Jobs', ['class' => 'btn btn-success btn-theme']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div><!-- end modal forgot password -->

