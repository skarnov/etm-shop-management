<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Edit Customer
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_shop/manage_customer">Manage Customer</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Edit Customer
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <form action="<?php echo base_url() ?>evis_shop/update_customer" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Customer ID</label>
                            <input type="text" name="customer_input_id" class="form-control" value="<?php echo $customer_info->customer_input_id;?>">
                            <input type="hidden" name="customer_id" class="form-control" value="<?php echo $customer_info->customer_id;?>">
                        </div>
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" value="<?php echo $customer_info->customer_name;?>">
                        </div>
                        <div class="form-group">
                            <label>Customer Address</label>
                            <input type="text" name="customer_address" class="form-control" value="<?php echo $customer_info->customer_address;?>">
                        </div>
                        <div class="form-group">
                            <label>Customer Mobile</label>
                            <input type="text" name="customer_mobile" class="form-control" value="<?php echo $customer_info->customer_mobile;?>">
                        </div>
                        <div class="form-group">
                            <label>Registration Date</label>
                            <input type="text" name="customer_registration_date" class="form-control" value="<?php echo $customer_info->customer_registration_date;?>">
                        </div>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>