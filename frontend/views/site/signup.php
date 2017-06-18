<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render("_authRegHeader"); ?>

<div class="block-section bg-color4">
    <div class="container">
        <div class="panel panel-md">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- buttons top -->
                        <p><a href="#" class="btn btn-primary btn-theme btn-block"><i class="fa fa-facebook pull-left bordered-right"></i> Login with Facebook</a></p>
                        <p><a href="#" class="btn btn-danger btn-theme btn-block"><i class="fa fa-google-plus pull-left bordered-right"></i> Login with Google</a></p>
                        <!-- end buttons top -->

                        <div class="white-space-10"></div>
                        <p class="text-center"><span class="span-line">OR</span></p>

                        <?php
                            $form = ActiveForm::begin(['id'=>'login-form']);
                            echo $form->field($model, 'username')->textInput(['autofocus'=>true]);
                            echo $form->field($model, 'email')->textInput(['autofocus'=>false]);
                            echo $form->field($model, 'password')->passwordInput();
                        ?>
                        <div class="white-space-10"></div>
                        <div class="form-group no-margin">
                            <?= Html::submitButton('Signup', ['class'=>'btn btn-theme btn-lg btn-t-primary btn-block']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="white-space-20"></div>
        <div class="text-center color-white">Not a member? &nbsp; <a href="<?= \yii\helpers\Url::toRoute(['site/signup']) ?>" class="link-white"><strong>Create an account free</strong></a></div>
    </div>
</div>

<?= $this->render("_findWithPhone"); ?>
