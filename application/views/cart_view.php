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
    function customerInfo(val)
    {
        if (val !== 'null')
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>cart/select_customer_due/' + val,
                success: function (data) {
                    $("#customerDue").html(data);
                }
            });
        }
    }
    function startCalc()
    {
        interval = setInterval("calc()", 1);
    }

    function calc()
    {
        customer_due = document.myForm.customer_due.value;
        net_amount = document.myForm.net_amount.value;
        paid_amount = document.myForm.paid_amount.value;
        discount_amount = document.myForm.discount_amount.value;
        document.myForm.due_amount.value = (customer_due * 1) + (net_amount * 1) - (discount_amount * 1) - (paid_amount * 1);
        document.myForm.current_due.value = (net_amount * 1) - (discount_amount * 1);
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Shopping Cart - New ID <?php echo $last_id->sale_id + 1; ?>
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
                    Grand Total: <span id="cart" style="color: red;"><?php echo $this->cart->total(); ?></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_sale');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_sale');
                    }
                    ?>
                </h3>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $contents = $this->cart->contents();
                            foreach ($contents as $v_contents) {
                                ?>
                                <tr>
                                    <td><?php echo $v_contents['name']; ?></td>
                                    <td>
                                        <form action="<?php echo base_url(); ?>cart/update_cart" method="POST">
                                            <input type="hidden"  value="<?php echo $v_contents['rowid']; ?>" name="rowid"/>
                                            <input type="number" name="product_quantity" value="<?php echo $v_contents['qty']; ?>" class="form-control" style="width: 60px;">
                                            &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary form-group" title="Update"><i class="fa fa-refresh"></i></button>
                                        </form>
                                    </td>
                                    <td><?php echo $v_contents['price']; ?></td>
                                    <td><?php echo $v_contents['subtotal']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>cart/remove/<?php echo $v_contents['rowid']; ?>" title="Remove" class="btn btn-danger"><i class="fa fa-times-circle"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
                $grand_total = $this->cart->total();
                $sdata = array();
                $sdata['grand_total'] = $grand_total;
                $this->session->set_userdata($sdata);
            ?>
            <form action="<?php echo base_url() ?>cart/save_sale" name="myForm" method="POST">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="<?php echo base_url(); ?>evis_shop/add_customer" class="btn btn-success btn-lg">Add New Customer</a>
                    </div>
                    <div class="col-xs-6 pull-right">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                <div class="form-group">
                                    <label>Old Customer ID</label>
                                    <input type="text" name="customer_input_id" required="required" onkeyup="customerInfo(this.value);" class="form-control" style="background-color: red; color: white; font-weight: bolder;">
                                </div>
                                <div id="customerDue"></div>
                                <tr>
                                    <td class="text-left"><strong>Grand Total</strong></td>
                                    <td class="text-left"><input type="number" name="net_amount" id="net_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" value="<?php echo $grand_total; ?>"></td>
                                </tr>                                
                                <tr>
                                    <td class="text-left"><strong>Discount</strong></td>
                                    <td class="text-left"><input type="number" name="sale_discount" id="discount_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td class="text-left"><strong>Current Due</strong></td>
                                    <td class="text-left"><input type="number" name="current_due" id="current_due" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td class="text-left"><strong>Paid Amount</strong></td>
                                    <td class="text-left"><input type="number" name="paid_amount" id="paid_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <?php
                    if ($grand_total > 0) {
                        ?>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-danger">Execute Sale</button>
                        </div>
                    <?php } ?>
                </div>
            </form>
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