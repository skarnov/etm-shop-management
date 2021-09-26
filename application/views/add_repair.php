<script type="text/javascript">
    function customerInfo(val)
    {
        if (val !== 'null')
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>evis_shop/select_customer/' + val,
                success: function (data) {
                    $("#customerInfo").html(data);
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
        document.myForm.due_amount.value = (customer_due * 1) + (net_amount * 1) - (paid_amount * 1);
        due_amount = document.myForm.due_amount.value;
        document.myForm.repair_due.value = (due_amount * 1) - (customer_due * 1);
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                New Repair
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_shop/manage_repair">Manage Repair</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    New Repair ID: <span style="color:red; font-weight: bolder"><?php echo $last_id->repair_id + 1; ?></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_repair');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_repair');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url() ?>evis_shop/save_repair" name="myForm" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Customer ID</label>
                            <input type="text" name="customer_input_id" required="required" onkeyup="customerInfo(this.value);" class="form-control" placeholder="Enter Customer ID">
                        </div>
                        <div id="customerInfo"></div>
                        <div class="form-group">
                            <label>Item Name</label>
                            <input type="text" name="item_name" class="form-control" placeholder="Enter Item Name">
                        </div>
                        <div class="form-group">
                            <label>Model No</label>
                            <input type="text" name="model_no" class="form-control" placeholder="Enter Model No">
                        </div>
                        <div class="form-group">
                            <label>IMEI</label>
                            <input type="text" name="imei" class="form-control" placeholder="Enter IMEI">
                        </div>
                        <div class="form-group">
                            <label>Problem</label>
                            <input type="text" name="problem" class="form-control" placeholder="Enter Problem Definition">
                        </div>
                        <div class="form-group">
                            <label>Extra Problem</label>
                            <input type="text" name="extra_problem" class="form-control" placeholder="Enter Extra Problem">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Net Price</label>
                            <input type="text" name="net_amount" id="net_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" placeholder="Enter Total Price">
                        </div>
                        <div class="form-group">
                            <label>Paid Amount</label>
                            <input type="text" name="paid_amount" id="paid_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" placeholder="Enter Paid Amount">
                        </div>
                        <div class="form-group">
                            <label>Repair Due</label>
                            <input type="text" name="repair_due" id="repair_due" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Battery Provide</label>
                            <select name="battery_provide" class="form-control">
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Remark</label>
                            <input type="text" name="remark" class="form-control" placeholder="Enter Remark">
                        </div>
                        <input type="hidden" name="receive_date" class="form-control" placeholder="Enter Receive Date" value="<?php echo date("d-m-Y"); ?>">
                        <div class="form-group">
                            <label>Delivery Date</label>
                            <input type="text" name="delivery_date" class="form-control" value="<?php echo date("d-m-Y"); ?>">
                        </div>         
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-success">Save Repair</button>
                        <a href="<?php echo base_url(); ?>evis_shop/print_repair/<?php echo $last_id->repair_id; ?>" class="btn btn-danger">Print</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>