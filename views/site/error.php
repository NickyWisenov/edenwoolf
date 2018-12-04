<?php

use yii\helpers\Url;

$this->title = 'EdenWoolf - Error 404';
?>
<!--mian-content-->
<a href="#"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/404/images/logo.png" alt="image" class="img-responsive center-block top-pad-img"></a>
<div class="main-wthree">
    <h2>404</h2>
    <p><span class="sub-agileinfo">Sorry! </span>The page you requested was not found!....</p>
    <!--form-->
    <a href="<?= Url::to('index'); ?>" class="btn btn-know">Go Back Home</a>
    <!--//form-->
</div>
<!--//mian-content-->
<!-- copyright -->
<div class="copyright-w3-agile">
    <p>Copyright © EdenWoolf <?= date('Y') ?></p>
</div>
<!-- //copyright --> 