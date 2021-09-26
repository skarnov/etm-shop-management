<script type="text/javascript">
    function brand(val)
    {
        if (val !== 'null')
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>evis_inventory/select_brand_model/' + val,
                success: function (data) {
                    $("#model").html(data);
                }
            });
        }
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                New Inventory
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_inventory/manage_inventory">Manage Inventory</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    New Inventory
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_inventory');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_inventory');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url() ?>evis_inventory/save_inventory" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
                            <select name="brand_id" onchange="brand(this.value);" class="form-control">
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
                            <label>Model</label>
                            <select name="model_id" id="model" class="form-control">
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Buying Price</label>
                            <input type="text" name="buying_price" class="form-control" placeholder="Enter Buying Price">
                        </div>
                        <div class="form-group">
                            <label>Selling Price</label>
                            <input type="text" name="selling_price" class="form-control" placeholder="Enter Selling Price">
                        </div>
                        <div class="form-group">
                            <label>Buying Quantity</label>
                            <input type="text" name="balance_qty" class="form-control" placeholder="Enter Buying Quantity">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>