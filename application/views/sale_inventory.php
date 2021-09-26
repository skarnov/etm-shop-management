<script type="text/javascript">
    function addToCart(val)
    {
        if (val !== 'null')
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>cart/add_to_cart/' + val,
                success: function (data) {
                    $("#cart").html(data);
                }
            });
        }
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Sale Inventory
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
                <li class="active">
                   Total: <span id="cart" style="color: red;"><?php echo $this->cart->total(); ?></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($search_inventory_list as $v_list) {
                                ?>
                                <tr>
                                    <td><?php echo $v_list->product_name; ?></td>
                                    <td><?php echo $v_list->brand_name; ?></td>
                                    <td><?php echo $v_list->model_name; ?></td>
                                    <td><?php echo $v_list->selling_price; ?></td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#smallModal"  onclick="addToCart(<?php echo $v_list->inventory_id; ?>);" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
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