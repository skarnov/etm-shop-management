<div class="form-group">
    <label>Due Amount</label>
    <input type="text" name="due_amount" id="due_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control">
    <input type="text" id="sale_due" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $sale_info->sale_due; ?>">
    <input type="text" name="customer_input_id" value="<?php echo $sale_info->customer_input_id; ?>">
</div>