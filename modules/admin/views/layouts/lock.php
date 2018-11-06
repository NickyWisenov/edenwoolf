<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use app\assets\backend\LockAsset;

LockAsset::register($this);
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
    <body class="">
        <?php $this->beginBody(); ?>
        <?= $content; ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<script type="text/javascript">
    var full_path = '<?= Yii::$app->request->baseUrl; ?>/';
</script>
<?php $this->endPage(); ?>