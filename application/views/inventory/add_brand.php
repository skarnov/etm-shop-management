<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                New Brand
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
                    New Brand
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_brand');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_brand');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url() ?>evis_inventory/save_brand" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" name="brand_name" required="required" class="form-control" placeholder="Enter Brand Name">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>