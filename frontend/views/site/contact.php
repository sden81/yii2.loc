<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
<div class="bg-color1 block-section line-bottom">
    <div class="container">
        <h2 class="text-center">We're here to help in any way we can.<br/>
            <small> Please submit your request below and we'll get back to you shortly.</small>
        </h2>
        <div class="white-space-20"></div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- form contact -->
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'email') ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'subject') ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                </div>
                <div class="form-group text-center">
                    <div class="white-space-10"></div>
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
                <!-- end form contact -->

                <div class="white-space-10"></div>
                <p class="text-center"><span class="span-line">OR</span></p>

                <!-- box with icon -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="box-ic-center ">
                            <i class="fa fa-phone ic-box"></i>
                            <h4>Phone</h4>
                            <p>+(62) 1234-123-21</p>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="box-ic-center ">
                            <i class="fa fa-skype ic-box"></i>
                            <h4>Skype</h4>
                            <p>your.username</p>
                        </div>

                    </div>
                </div> <!-- end box with icon -->
            </div>
        </div>
    </div>
</div>