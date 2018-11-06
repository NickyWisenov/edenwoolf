<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use app\assets\backend\LoginAsset;

LoginAsset::register($this);
?>

<?php $this->beginPage(); ?>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset; ?>">
        <title><?= Html::encode($this->title); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <?= Html::csrfMetaTags(); ?>
        <?= $this->head(); ?>
        <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl; ?>/favicon.ico">
    </head>
    <body class=" login">
        <?php $this->beginBody(); ?>
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset">
                    <div class="login-bg" style="background-image:url(<?= Yii::$app->request->baseUrl; ?>/backend/assets/pages/img/login/bg1.jpg)">
                        <?= Html::img('@web/frontend/images/logo.png', ['width' => 95, 'class' => "login-logo", 'alt' => "logo"]); ?>
                    </div>
                </div>
                <div class="col-md-6 login-container bs-reset">
                    <?= $content; ?>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <?php $this->endBody(); ?>
    </body>
</html>
<script type="text/javascript">
    var full_path = '<?= Yii::$app->request->baseUrl; ?>/';

    $(document).ready(function () {
        $("form#admin-forgot-password-form").submit(function (event) {
            event.preventDefault();
            $('.errorMsg').parent().hide();
            $('#submit-btn').attr('disabled', true);
            var data = new FormData($("#admin-forgot-password-form")[0]);
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                url: full_path + 'admin/auth/forgotpassword',
                headers: {'X-CSRF-TOKEN': csrfToken},
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: data,
                success: function (data) {
                    if (data.res == 1) {
                        window.location.href = data.link;
                    } else if (data.res == 0) {
                        $(".errorMsg").html('');
                        $.each(data.error, function (i, val) {
                            $("#err_" + i).html(val);
                        });
                        $('#submit-btn').removeAttr('disabled');
                        $('.errorMsg').parent().show();
                    }
                }
            })
        });

        $('#back-btn').click(function () {
            $('.errorMsg').parent().hide();
        })
    })
</script>
<?php $this->endPage(); ?>