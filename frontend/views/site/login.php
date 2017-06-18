<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render("_authRegHeader"); ?>

<!-- body-content -->
<div class="body-content clearfix" >
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
                                echo $form->field($model, 'password')->passwordInput();
                            ?>
                            <div class="white-space-10"></div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="checkbox flat-checkbox">
                                            <label>
                                                <?= Html::activeCheckbox($model, 'rememberMe')?>
                                                <span class="fa fa-check"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <p class="help-block"><a href="#myModal" data-toggle="modal">Forgot password?</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group no-margin">
                                <?= Html::submitButton('Login', ['class'=>'btn btn-theme btn-lg btn-t-primary btn-block']) ?>
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

    <!-- modal forgot password -->
    <div class="modal fade" id="myModal" >
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <?php $form = ActiveForm::begin(['id'=>'password-reset-form']); ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" >Forgot Password</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Enter Your Email</label>
                            <?= $form->field($modelPasswordReset, 'email')->textInput(['autofocus'=>true, 'placeholder' => 'Email'])->label(false) ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-theme" data-dismiss="modal">Close</button>
                        <?= Html::submitButton('Send', ['class'=>'btn btn-success btn-theme', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div><!-- end modal forgot password -->
</div><!--end body-content -->

