<script type="text/javascript">
    function startCalc()
    {
        interval = setInterval("calc()", 1);
    }
    
    function calc()
    {
        net_amount = document.myForm.net_amount.value;
        paid_amount = document.myForm.paid_amount.value;
        now_paid_amount = document.myForm.now_paid_amount.value;
        document.myForm.repair_due.value = (net_amount * 1) - (paid_amount * 1) - (now_paid_amount * 1);
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Edit Repair
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
                    Edit Repair
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <form name="myForm" action="<?php echo base_url() ?>evis_shop/update_repair" method="POST">
                    <div class="col-xs-6">
                        <div id="customerInfo"></div>
                        <input type="hidden" name="customer_input_id" class="form-control" value="<?php echo $repair_info->customer_input_id; ?>">
                        <input type="hidden" name="repair_id" class="form-control" value="<?php echo $repair_info->repair_id; ?>">
                        <div class="form-group" style="border: 2px solid red; padding: 1.6%;">
                            <h3><?php echo $repair_info->customer_name; ?></h3>
                            <p><?php echo $repair_info->customer_mobile; ?></p>
                            <p><?php echo $repair_info->customer_address; ?></p>
                        </div>
                        <input type="hidden" name="customer_due" class="form-control" value="<?php echo $repair_info->customer_due; ?>">
                        <input type="hidden" name="customer_name" class="form-control" value="<?php echo $repair_info->customer_name; ?>">
                        <input type="hidden" name="customer_address" value="<?php echo $repair_info->customer_address; ?>" class="form-control">
                        <input type="hidden" name="customer_mobile" class="form-control" value="<?php echo $repair_info->customer_mobile; ?>">
                        <div class="form-group">
                            <label>Item Name</label>
                            <input type="text" name="item_name" class="form-control" value="<?php echo $repair_info->item_name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Model No</label>
                            <input type="text" name="model_no" class="form-control" value="<?php echo $repair_info->model_no; ?>">
                        </div>
                        <div class="form-group">
                            <label>IMEI</label>
                            <input type="text" name="imei" class="form-control" value="<?php echo $repair_info->imei; ?>">
                        </div>
                        <div class="form-group">
                            <label>Problem</label>
                            <input type="text" name="problem" class="form-control" value="<?php echo $repair_info->problem; ?>">
                        </div>
                        <div class="form-group">
                            <label>Extra Problem</label>
                            <input type="text" name="extra_problem" class="form-control" value="<?php echo $repair_info->extra_problem; ?>">
                        </div>
                        <div class="form-group">
                            <label>From Where</label>
                            <input type="text" name="from_where" class="form-control" value="<?php echo $repair_info->from_where; ?>">
                        </div>
                        <div class="form-group">
                            <label>How Much</label>
                            <input type="text" name="how_much" class="form-control" value="<?php echo $repair_info->how_much; ?>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Net Price</label>
                            <input type="text" name="net_amount" id="net_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" value="<?php echo $repair_info->net_amount; ?>">
                        </div>
                        <div class="form-group">
                            <label>Paid Amount</label>
                            <input type="text" id="paid_amount" name="paid_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" value="<?php echo $repair_info->paid_amount; ?>">
                        </div>
                        <div class="form-group">
                            <label>Now Paid Amount</label>
                            <input type="text" name="now_paid_amount" id="now_paid_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Repair Due</label>
                            <input type="text" name="repair_due" id="repair_due" class="form-control" value="<?php echo $repair_info->repair_due; ?>">
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
                            <input type="text" name="remark" class="form-control" value="<?php echo $repair_info->remark; ?>">
                        </div>
                        <div class="form-group">
                            <label>Delivery Date</label>
                            <input type="text" name="delivery_date" class="form-control" value="<?php echo date("d-m-Y"); ?>">
                        </div>
                        <div class="form-group">
                            <label>Receive Date</label>
                            <input type="text" name="receive_date" class="form-control" value="<?php echo $repair_info->receive_date; ?>">
                        </div>
                        <div class="form-group">
                            <label>Delivery Status</label>
                            <select name="delivery_status" class="form-control">
                                <option value="">Select Problems</option>
                                <option value="1">Delivered</option>
                                <option value="2">Delivered But Not OK</option>
                            </select>
                        </div>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['myForm'].elements['battery_provide'].value = '<?php echo $repair_info->battery_provide; ?>';
    document.forms['myForm'].elements['delivery_status'].value = '<?php echo $repair_info->delivery_status; ?>';
</script>