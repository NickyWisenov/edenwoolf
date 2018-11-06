<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <script type="text/javascript">
            var full_path = '<?= Yii::$app->request->baseUrl; ?>/admin/';
            var base_path = '<?= Yii::$app->request->baseUrl; ?>/';
        </script>
        <meta charset="<?= Yii::$app->charset; ?>">
        <title><?= Html::encode($this->title); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <?= Html::csrfMetaTags(); ?>
        <?= $this->head(); ?>
        <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl; ?>/favicon.ico">
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <?= $this->beginBody(); ?>
        <?= $content; ?>
        <?= $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>

<script type="text/javascript">
    function ajaxindicatorstart_search()
    {
     $('.searchloader').show();   
    }
    function ajaxindicatorstop_search()
    {
      $('.searchloader').hide();  
    }
    function ajaxindicatorstart()
    {
        if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
            jQuery('body').append('<div id="resultLoading" style="display:none"><div><img style="position:relative; top:-50%; border-radius:6px; " src="<?= Yii::$app->getUrlManager()->getBaseUrl() . "/frontend/images/loader.gif"; ?>"></div><div class="bg"></div></div>');
        }

        jQuery('#resultLoading').css({
            'width': '100%',
            'height': '100%',
            'position': 'fixed',
            'z-index': '10000000',
            'top': '0',
            'left': '0',
            'right': '0',
            'bottom': '0',
            'margin': 'auto'
        });

        jQuery('#resultLoading .bg').css({
            'background': '#000',
            'opacity': '0.6',
            'width': '100%',
            'height': '100%',
            'position': 'absolute',
            'top': '0'
        });

        jQuery('#resultLoading>div:first').css({
            'width': '250px',
            'height': '75px',
            'text-align': 'center',
            'position': 'fixed',
            'top': '0',
            'left': '0',
            'right': '0',
            'bottom': '0',
            'margin': 'auto',
            'font-size': '16px',
            'z-index': '10',
            'color': '#ffffff'

        });

        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeIn(300);
        jQuery('body').css('cursor', 'wait');
    }

    function ajaxindicatorstop()
    {
        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeOut(300);
        jQuery('body').css('cursor', 'default');
    }
</script>