<div class="form-group">
    <label>Customer Name</label>
    <input type="text" name="customer_name" value="<?php echo $customer_info->customer_name; ?>" class="form-control">
</div>
<div class="form-group">
    <label>Total Due Amount For <?php echo $customer_info->customer_name; ?></label>
    <input type="text" name="due_amount" id="due_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control">
    <input type="hidden" id="customer_due" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $customer_info->customer_due; ?>">
</div>