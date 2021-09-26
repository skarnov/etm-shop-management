<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Edit Model
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_inventory/manage_model">Manage Model</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Edit Model
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <form action="<?php echo base_url() ?>evis_inventory/update_model" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Model Name</label>
                            <input type="text" name="model_name" class="form-control" value="<?php echo $model_info->model_name; ?>">
                            <input type="hidden" name="model_id" value="<?php echo $model_info->model_id; ?>">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>