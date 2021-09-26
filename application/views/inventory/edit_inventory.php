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
                Edit Inventory
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
                    Edit Inventory
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <form name="myForm" action="<?php echo base_url() ?>evis_inventory/update_inventory" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $inventory_info->product_name; ?>">
                            <input type="hidden" name="inventory_id" value="<?php echo $inventory_info->inventory_id; ?>">
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
                                <?php
                                foreach ($all_model as $v_model) {
                                    ?>
                                    <option value="<?php echo $v_model->model_id; ?>"><?php echo $v_model->model_name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Buying Price</label>
                            <input type="text" name="buying_price" class="form-control" value="<?php echo $inventory_info->buying_price; ?>">
                        </div>
                        <div class="form-group">
                            <label>Selling Price</label>
                            <input type="text" name="selling_price" class="form-control" value="<?php echo $inventory_info->selling_price; ?>">
                        </div>
                        <div class="form-group">
                            <label>Buying Quantity</label>
                            <input type="text" name="balance_qty" class="form-control" value="<?php echo $inventory_info->balance_qty; ?>">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['myForm'].elements['brand_id'].value = '<?php echo $inventory_info->brand_id; ?>';
    document.forms['myForm'].elements['model_id'].value = '<?php echo $inventory_info->model_id; ?>';
</script>