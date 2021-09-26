<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                New Model
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
                    New Model
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_model');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_model');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url() ?>evis_inventory/save_model" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Brand</label>
                            <select name="brand_id" class="form-control">
                                <option value="">Select Brand</option>
                                <?php
                                foreach ($all_brand as $v_brand) {
                                    ?>
                                    <option value="<?php echo $v_brand->brand_id; ?>"><?php echo $v_brand->brand_name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Model Name</label>
                            <input type="text" name="model_name" required="required" class="form-control" placeholder="Enter Model Name">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>