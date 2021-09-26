<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Edit Brand
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_inventory/manage_brand">Manage Brand</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Edit Brand
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <form action="<?php echo base_url() ?>evis_inventory/update_brand" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" name="brand_name" class="form-control" value="<?php echo $brand_info->brand_name; ?>">
                            <input type="hidden" name="brand_id" value="<?php echo $brand_info->brand_id; ?>">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>