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
            <h1 class="page-header">Dashboard <small>Version 0.0.3</small></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-usd fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="h3">
                                <?php echo $customer_due->customer_due; ?>
                            </div>
                            <div>Customer Due</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-money fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="h3">
                                <?php echo $total_sales->total_sales; ?>
                            </div>
                            <div>Total Sales</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tree fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="h3">
                                <?php echo $total_repair->total_repair; ?>
                            </div>
                            <div>Total Repair</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-rss fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="h3">
                                <?php echo $total_inventory->total_inventory; ?>
                            </div>
                            <div>Inventory Invest</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo base_url() ?>evis_inventory/search_inventory" method="POST">
                <div class="col-xs-4">
                    <div class="form-group">
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
                        <select name="model_id" id="model" class="form-control">

                        </select>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div><br/>
</div>
