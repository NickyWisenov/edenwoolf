<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Favourite Families';
?>

<!-- *****************Join-start****************** -->
<section class="dash-main-body new-added-css db-mn-bdy-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel-body-main">
                    <div class="clearfix">
                        
                            <?= Yii::$app->controller->renderPartial('@app/views/partials/left_carer.php'); ?>
                      
                        <div class="col-md-9 col-sm-8 padding-lt-rt">
                            <div class="right-part">
                                <?= Yii::$app->controller->renderPartial('@app/views/partials/carer-top-menu.php'); ?>
                                <div class="bottom-part">
                                    <div class="clearfix">
                                        <h1 class="mn-heading">Favourite Families</h1>
                                        <form id="loadListField" action="" method="POST">
                                            <input type="hidden" id="limit" name="limit" value="<?= $limit; ?>">
                                            <input type="hidden" id="offset" name="offset" value="<?= $offset; ?>">
                                        </form>
                                        <div class="job-list-grp" id="all_list"></div>
                                        <div class="btm-btm-bx text-center">
                                            <a href="javascript:;" class="btn btn-all" style="display:none;" id="load_btn" onclick="myFavList('carer');">Load More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- *****************Join-end****************** -->

<script>
    $(document).ready(function () {
        myFavList('carer');
    })
</script>