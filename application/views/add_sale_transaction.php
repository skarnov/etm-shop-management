<script type="text/javascript">
    function saleInfo(val)
    {
        if (val !== 'null')
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>evis_shop/select_sale/' + val,
                success: function (data) {
                    $("#saleInfo").html(data);
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
        sale_due = document.myForm.sale_due.value;
        net_amount = document.myForm.net_amount.value;
        paid_amount = document.myForm.paid_amount.value;
        document.myForm.due_amount.value = (sale_due * 1) + (net_amount * 1) - (paid_amount * 1);
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                New Sale Transaction
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_shop/manage_sale_transaction">Manage Sale Transaction</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    New Sale Transaction
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_sale_transaction');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_sale_transaction');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url() ?>evis_shop/save_sale_transaction" name="myForm" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Sale ID</label>
                            <input type="text" name="sale_id" required="required" onkeyup="saleInfo(this.value);" class="form-control" placeholder="Enter Sale ID">
                        </div>
                        <div id="saleInfo"></div>
                        <div id="warning"></div>
                        <div class="form-group">
                            <label>Deposit Amount</label>
                            <input type="text" name="net_amount" id="net_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" placeholder="Enter Total Price">
                        </div>
                        <div class="form-group">
                            <label>Paid Amount</label>
                            <input type="text" name="paid_amount" id="paid_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" placeholder="Enter Paid Amount">
                        </div>
                        <div class="form-group">
                            <label>Transaction Date</label>
                            <input type="text" name="transaction_date" class="form-control" value="<?php echo date("d-m-Y"); ?>">
                        </div>
                    </div>
                    <div class="col-xs-6">        
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-danger">Execute</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>