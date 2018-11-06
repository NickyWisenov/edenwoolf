<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use app\assets\frontend\NotieAsset;

NotieAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags(); ?>
        <title><?= Html::encode($this->title); ?></title>
        <?php $this->head(); ?>
        <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl; ?>/favicon.ico">
        <script>
            var full_path = '<?= Url::base(); ?>/';
            var logged_in = <?= Yii::$app->user->isGuest ? 'false' : 'true'; ?>;
            var csrf_token = '<?= Yii::$app->request->csrfToken ?>';
        </script>
    </head>
    <body>
        <?php $this->beginBody(); ?>
        <?= $content; ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>

<?php
if (Yii::$app->session->hasFlash('success')) {
    ?>
    <script>
        notie.alert({type: 1, text: '<?= Yii::$app->session->getFlash('success'); ?>', time: 5});
    </script>
    <?php
}
if (Yii::$app->session->hasFlash('error')) {
    ?>
    <script>
        notie.alert({type: 3, text: '<?= Yii::$app->session->getFlash('error'); ?>', time: 5});
    </script>
    <?php
}
?>

<script type="text/javascript">
    $(document).ready(function ($) {
        adjustWinHeight();

        $(window).resize(function () {
            adjustWinHeight();
        });

    });

    function adjustWinHeight() {
        var $ = jQuery;
        var winHeight = $(window).height();
        var footerHeight = $('.footer').height();
        var headerHeight = $('.header').height();
        var mainHeight = winHeight - (parseInt(headerHeight) + parseInt(footerHeight));

        $('.main-body-wrap').css('min-height', mainHeight);
    }
     function ajaxindicatorstart_search()
    {
     $('.searchloader').show();   
    }
    function ajaxindicatorstop_search()
    {
      $('.searchloader').hide();  
    }

    function ajaxindicatorstart() {
        if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
            jQuery('body').append('<div id="resultLoading" style="display:none"><div><i style="font-size: 46px;color: #8EB849; " class="fa fa-spinner fa-spin fa-3x fa-fw" aria-hidden="true"></i></div><div class="bg"></div></div>');
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

    function ajaxindicatorstop() {
        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeOut(300);
        jQuery('body').css('cursor', 'default');
    }
</script>