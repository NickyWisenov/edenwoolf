<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carers';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="page-title"><?= $this->title; ?>
    <small>Manage all the <?= strtolower($this->title); ?> of the site from here</small>
</h3>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user-md font-green-haze" aria-hidden="true"></i>
                    <span class="caption-subject font-green-haze bold uppercase"><?= $this->title; ?> List</span>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="<?= Url::to(['carer/create']); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Create Carer</a>&nbsp;
                    <a class="btn btn-info" href="javascript:;" onclick="$('#search_filter').toggle();"><i class="fa fa-search" aria-hidden="true"></i> Filter</a>&nbsp;
                    <a class="btn btn-info" href="<?= Url::to(['carer/index']); ?>"><i class="glyphicon glyphicon-repeat"></i></i> Reset</a>
                </div>
            </div>
            <div class="portlet-body form" id="search_filter" style="display: <?= ($search_filter == 1) ? 'block' : 'none'; ?>;">
                <!-- BEGIN FORM-->
                <form class="form-horizontal" action="" method="GET">
                    <input type="hidden" name="search_filter" value="1"/>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">First Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?= (isset($first_name) && $first_name != '') ? $first_name : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Last Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?= (isset($last_name) && $last_name != '') ? $last_name : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?= (isset($email) && $email != '') ? $email : ''; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Phone</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?= (isset($phone) && $phone != '') ? $phone : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option <?= (isset($status) && $status == 'all') ? 'selected' : ''; ?> value="all">Show All</option>
                                            <option <?= (isset($status) && $status == 'inactive') ? 'selected' : ''; ?> value="inactive">Inactive</option>
                                            <option <?= (isset($status) && $status == 'active') ? 'selected' : ''; ?> value="active">Active</option>
                                            <option <?= (isset($status) && $status == 'suspended') ? 'selected' : ''; ?> value="suspended">Suspended</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn green">Search</button>               
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th class="bold"> # </th>
                                <th class="bold"> First Name </th>
                                <th class="bold"> Last Name </th>
                                <th class="bold"> Email </th>
                                <th class="bold"> Phone </th>
                                <th class="bold"> Last Login </th>
                                <th class="bold"> Total Login </th>
                                <th class="bold"> Status </th>
                                <th class="bold" width="10%"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($model) > 0) {
                                foreach ($model as $key => $val) {
                                    ?>
                                    <tr>
                                        <td> <?= $key + 1; ?> </td>
                                        <td> <?= (isset($val->first_name) && $val->first_name != '') ? $val->first_name : "Not Given"; ?> </td>
                                        <td> <?= (isset($val->last_name) && $val->last_name != '') ? $val->last_name : "Not Given"; ?> </td>
                                        <td> <?= (isset($val->email) && $val->email != '') ? $val->email : "Not Given"; ?> </td>
                                        <td> <?= (isset($val->phone) && $val->phone != '') ? $val->phone : "Not Given"; ?> </td>
                                        <td> <?= (isset($val->last_login) && $val->last_login != '') ? date('jS F Y, g:i A', strtotime($val->last_login)) : "Not Found"; ?> </td>
                                        <td> <?= (isset($val->login_count) && $val->login_count != 0) ? $val->login_count : "Not Found"; ?> </td>
                                        <td> 
                                            <?php
                                            if ($val->status == '0') {
                                                echo "<span class='label label-warning'>Inactive</span>";
                                            } else if ($val->status == '1') {
                                                echo "<span class='label label-success'>Active</span>";
                                            } else if ($val->status == '2') {
                                                echo "<span class='label label-danger'>Suspended</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?= Url::to(['view', 'id' => $val->id]); ?>" style="text-decoration: none;" title="View">
                                                <span class="glyphicon glyphicon-eye-open"></span> 
                                            </a>
                                            <a href="<?= Url::to(['update', 'id' => $val->id]); ?>" style="text-decoration: none;" title="Update">
                                                <span class="glyphicon glyphicon-pencil"></span> 
                                            </a>
                                            <a href="javascript:;" onclick="deleteCarer(this);" data-id="<?= $val->id; ?>" style="text-decoration: none;" title="Delete">
                                                <span class="glyphicon glyphicon-trash"></span> 
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="8" style="text-align: center;">No Record Found!</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?=
                LinkPager::widget([
                    'pagination' => $pagination
                ]);
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deletecarerModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #17C4BB;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: white;">Delete <?= $this->title; ?></h4>
            </div>
            <div class="modal-body">
                <h4>Do you want to delete this <?= strtolower($this->title); ?>?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <a id="deletecarerButton" class="btn btn-success" style="background-color: #17C4BB;">Yes</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>
    function deleteCarer(obj) {
        var id = $(obj).attr("data-id");
        var url = full_path + 'carer/delete?id=' + id;
        $("#deletecarerButton").attr("href", url);
        $("#deletecarerModal").modal('show');
    }
</script>