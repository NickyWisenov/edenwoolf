<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\controllers\FrontController;
?>
<div class="col-md-3 col-sm-4 padding-lt-rt">
    <div class="left-part">
        <div class="top-part deep-color">
            <div class="media">
                <div class="media-left"> <img src="<?= $this->context->getUserProfileImage() ?>" class="media-object img-circle"> </div>
                <div class="media-body">
                    <h1>Welcome</h1>
                    <h2><?= $this->context->getName(Yii::$app->user->id); ?></h2>
                    <p><a href="<?= Url::toRoute(['site/logout']); ?>">Log off</a></p>
                </div>
            </div>
        </div>
        <div class="bottom-part">
            <ul>
                <li class="<?= (FrontController::route() == 'carer/dashboard') ? 'active' : ''; ?>"><a href="<?= Url::toRoute(['carer/dashboard']); ?>"><i class="fa fa-home" aria-hidden="true"></i> My Jobs</a></li>
                <li class="<?= (FrontController::route() == 'carer/editprofile') ? 'active' : ''; ?>"><a href="<?= Url::toRoute(['carer/editprofile']); ?>"><i class="fa fa-user" aria-hidden="true"></i>Edit profile</a></li> 
                <!--<li><a href="javascript:;"><i class="fa fa-envelope" aria-hidden="true"></i>Messages</a></li>-->
                <li class=""><a href="javascript:;"><i class="fa fa-money" aria-hidden="true"></i>Transactions</a></li>
                <li class=""><a href="javascript:;"><i class="fa fa-rss" aria-hidden="true"></i>Subscription plan</a></li>
                <!--<li><a href="javascript:;"><i class="fa fa-briefcase" aria-hidden="true"></i>All jobs</a></li>-->
                <li class=""><a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i>Reviews</a></li>
                <li class=""><a href="javascript:;"><i class="fa fa-star-o" aria-hidden="true"></i>Unpaid care</a></li>
                <!--<li><a href="javascript:;"><i class="fa fa-lock" aria-hidden="true"></i>Change password</a></li>-->
                <li class="<?= (FrontController::route() == 'carer/favlist') ? 'active' : ''; ?>"><a href="<?= Url::toRoute(['carer/favlist']); ?>"><i class="fa fa-heart" aria-hidden="true"></i>Favourite families</a></li>
            </ul>
        </div>
    </div>
</div>