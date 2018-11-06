<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

$cookies = Yii::$app->request->cookies;
?>
<div class="login-content">
    <h1>Eden Woolf Admin Login</h1>
    <p> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p>
    <?php
    $form = ActiveForm::begin([
                'id' => 'admin-login-form',
                'options' => ['class' => 'login-form'],
    ]);
    if (Yii::$app->getSession()->hasFlash('success')):
        ?>
        <div class="alert alert-success">
            <button class="close" data-close="alert"></button>
            <span>
                <?= Yii::$app->getSession()->getFlash('success'); ?>
            </span>
        </div>
        <?php
    endif;
    if ($model->hasErrors('login_error')):
        ?>
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span>
                <?= $model->getErrors('login_error')[0]; ?>
            </span>
        </div>
        <?php
    endif;
    ?>
    <div class="row">
        <div class="col-xs-6">
            <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email *" name="LoginForm[email]" value="<?php
            if ($cookies->has('admin_email')) {
                echo $cookies->getValue('admin_email');
            }
            ?>" required/> </div>
        <div class="col-xs-6">
            <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password *" name="LoginForm[password]" value="<?php
            if ($cookies->has('admin_password')) {
                echo $cookies->getValue('admin_password');
            }
            ?>" required/> </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="rem-password">
                <p>Remember Me
                    <input type="checkbox" name="LoginForm[rememberMe]" value="1" <?php
                    if ($cookies->has('admin_email') && $cookies->has('admin_password')) {
                        echo 'checked="checked"';
                    }
                    ?> class="rem-checkbox" />
                </p>
            </div>
        </div>
        <div class="col-sm-8 text-right">
            <div class="forgot-password">
                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
            </div>
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button', 'class' => 'btn green']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <div class="alert alert-danger" style="margin-top: 0; display:none;">
        <button class="close" data-close="alert"></button>
        <span class="errorMsg" id="err_email"></span>
    </div>
    <form id="admin-forgot-password-form" class="forget-form">
        <h3 class="font-green">Forgot Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email *" name="UserMaster[email]" />
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn grey btn-default">Back</button>
            <button type="submit" id="submit-btn" class="btn blue btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
<div class="login-footer">
    <div class="row bs-reset">
        <div class="col-xs-5 bs-reset">
            <ul class="login-social">
                <li>
                    <a href="javascript:;">
                        <i class="icon-social-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-social-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-social-dribbble"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-xs-7 bs-reset">
            <div class="login-copyright text-right">
                <p>Copyright &copy; Eden Woolf <?= date('Y'); ?></p>
            </div>
        </div>
    </div>
</div>