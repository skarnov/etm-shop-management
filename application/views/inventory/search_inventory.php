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
                Search Inventory
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_shop/add_sales">New Sale</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>cart/show_cart">Shopping Cart</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_inventory/manage_inventory">Manage Inventory</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Total: <span id="cart" style="color: red;"><?php echo $this->cart->total(); ?></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
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

                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th style="color: red;">Buying Price</th>
                        <th style="color: green;">Selling Price</th>
                        <th style="color: #38b738;">Balance Quantity</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($search_inventory_list as $v_inventory) {
                                ?>
                                <tr>
                                    <td><?php echo $v_inventory->product_name; ?></td>
                                    <td><?php echo $v_inventory->brand_name; ?></td>
                                    <td><?php echo $v_inventory->model_name; ?></td>
                                    <td style="color: red;"><b><?php echo $v_inventory->buying_price; ?></b></td>
                                    <td style="color: green;"><b><?php echo $v_inventory->selling_price; ?></b></td>
                                    <?php
                                    $qty = $v_inventory->balance_qty;
                                    if ($qty < 3) {
                                        ?>
                                        <td style="color: red;"><b><?php echo $v_inventory->balance_qty; ?></b></td>
                                        <?php
                                    } else {
                                        ?>
                                        <td style="color: #286090;"><b><?php echo $v_inventory->balance_qty; ?></b></td>
                                        <?php
                                    }
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url(); ?>evis_inventory/edit_inventory/<?php echo $v_inventory->inventory_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Inventory"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>evis_inventory/delete_inventory/<?php echo $v_inventory->inventory_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Inventory" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Success-->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Shopping Cart</h4>
            </div>
            <div class="modal-body">
                <h3>Success!</h3>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" type="button" class="btn btn-primary">Continue Shopping</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Cart Success-->