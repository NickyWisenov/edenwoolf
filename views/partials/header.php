<?php

use yii\helpers\Url;

$session = Yii::$app->session;
if(Yii::$app->controller->action->id != "familysearch" && Yii::$app->controller->action->id !='familyprofile'){
        for($i=1;$i<=7;$i++){
            isset($session['start_time_'.$i])?$session['start_time_'.$i]='':'';
            isset($session['end_time_'.$i])?$session['end_time_'.$i]='':'';
        }
}
if(Yii::$app->controller->action->id != "carersearch" && Yii::$app->controller->action->id !='carerprofile'){
        for($i=1;$i<=7;$i++){
            isset($session['carer_start_time_'.$i])?$session['carer_start_time_'.$i]='':'';
            isset($session['carer_end_time_'.$i])?$session['carer_end_time_'.$i]='':'';
        }
}
if(Yii::$app->controller->action->id != "carerprofile" && Yii::$app->controller->action->id !='carersearch'){
        $session['all_carer']='';
}
if(Yii::$app->controller->action->id != "familyprofile" && Yii::$app->controller->action->id !='familysearch'){
        $session['all_family']='';
}
?>

<header class="header <?= ((Yii::$app->controller->id != "site" || Yii::$app->controller->action->id != "index")) ? ' innerheader ' : '' ?>">
    <div class="nav-sec">
        <div id="navigation" class="animated">
            <nav class="navbar navbar-custom" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="navbar-header">
                                <div class="site-logo">
                                    <a href="<?= Url::to(['site/index']); ?>" class="brand"><img class="img-responsive" src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/logo.png" alt=""/></a>                                                   
                                </div>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                    <i class="fa fa-bars"></i>                                                
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="menu">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active">
                                        <a href="<?= Url::to(['site/index']); ?>">Home</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['site/aboutus']); ?>">About</a>
                                    </li>
                                    <?php
                                    if (Yii::$app->user->isGuest) {
                                        ?>
                                        <li>
                                            <a href="<?= Url::to(['site/join']); ?>">Join</a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <a href="javascript:;<?php // Url::to(['joblog/index']);     ?>">Log a job</a>
                                        <!--<a href="javascript:;<?php // Url::to(['joblog/index']);     ?>" onclick="redirectToLogAJobLink();">Log a job</a>-->
                                    </li>
                                    <li>
                                        <a href="javascript:;" onclick="searchAllCarers();">Search carers</a>
                                        <!--<a href="javascript:;">Search carers</a>-->
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['search/familysearch']); ?>">Search families</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['blogs/index']); ?>">Blogs</a>
                                    </li>
                                    <?php
                                    if (Yii::$app->user->isGuest) {
                                        ?>
                                        <li>
                                            <a href="javascript:;" onclick="showSigninModal();">Log in</a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li>
                                            <div class="dropdown dash-drop">
                                                <span data-toggle="dropdown">
                                                    <img class="img-responsive img-circle headr-prof-pic" src="<?= $this->context->getUserProfileImage() ?>" alt="">
                                                    <h1><?= $this->context->getName(Yii::$app->user->id); ?> <i class="fa fa-caret-down" aria-hidden="true"></i></h1>
                                                </span>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                    if (Yii::$app->user->identity->type_id === '2') {
                                                        ?>
                                                        <li><a href="<?= Url::toRoute(['carer/dashboard']); ?>" data-original-title="" title=""><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                                                        <li><a href="<?= Url::toRoute(['carer/editprofile']); ?>" data-original-title="" title=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Edit Profile</a></li>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <li><a href="<?= Url::toRoute(['family/dashboard']); ?>" data-original-title="" title=""><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                                                        <li><a href="<?= Url::toRoute(['family/editprofile']); ?>" data-original-title="" title=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Edit Profile</a></li>
                                                        <?php
                                                    }
                                                    ?>
                                                    <li><a href="<?= Url::toRoute(['site/logout']); ?>" data-original-title="" title=""><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Logout</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- /.Navbar-collapse -->
                        </div>
                    </div>
                </div> 
            </nav>
        </div>    
    </div>    
</header>

<script>
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 20) {
            $(".header").addClass("darkHeader");
        } else {
            $(".header").removeClass("darkHeader");
        }
    });
</script>