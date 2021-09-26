<div class="form-group">
    <label>Due Amount</label>
    <input type="text" name="due_amount" id="due_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control">
    <input type="hidden" id="repair_due" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $repair_info->repair_due; ?>">
    <input type="hidden" name="customer_input_id" value="<?php echo $repair_info->customer_input_id; ?>">
</div>