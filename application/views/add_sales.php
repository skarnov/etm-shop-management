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
                New Sale
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_shop/manage_sales">Manage Sales</a>
                </li>
                <li class="active">
                    New Sale
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <form action="<?php echo base_url() ?>evis_shop/sale_inventory" method="POST">
                    <div class="col-xs-6">
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
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Model</label>
                            <select name="model_id" id="model" class="form-control">
                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>