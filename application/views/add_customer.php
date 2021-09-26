<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                New Customer
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
                <li>
                    <a href="<?php echo base_url() ?>evis_shop/add_sales">New Sale</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    New Customer
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_customer');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_customer');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url() ?>evis_shop/save_customer" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Customer ID</label>
                            <input type="text" name="customer_input_id" class="form-control" placeholder="Enter Customer ID">
                        </div>
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name">
                        </div>
                        <div class="form-group">
                            <label>Customer Address</label>
                            <input type="text" name="customer_address" class="form-control" placeholder="Enter Customer Address">
                        </div>
                        <div class="form-group">
                            <label>Customer Mobile</label>
                            <input type="text" name="customer_mobile" class="form-control" placeholder="Enter Customer Mobile">
                        </div>
                        <div class="form-group">
                            <label>Registration Date</label>
                            <input type="text" name="customer_registration_date" class="form-control" value="<?php echo date("d-m-Y"); ?>">
                        </div>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>