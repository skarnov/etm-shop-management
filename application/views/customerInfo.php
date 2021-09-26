<?php
    if($customer_info == NULL)
    {
?>
<div class="form-group" style="border: 2px solid red; padding: 1.6%;">
    <img src="<?php echo base_url(); ?>img/loading.gif" class="img-responsive" />
</div>
<?php
    }
    else
    {
?>
<div class="form-group" style="border: 2px solid red; padding: 1.6%;">
    <h3><?php echo $customer_info->customer_name; ?></h3>
    <p><?php echo $customer_info->customer_mobile; ?></p>
    <p><?php echo $customer_info->customer_address; ?></p>
</div>
<input type="hidden" name="customer_name" value="<?php echo $customer_info->customer_name; ?>" class="form-control">
<input type="hidden" name="customer_address" value="<?php echo $customer_info->customer_address; ?>" class="form-control">
<input type="hidden" name="customer_mobile" value="<?php echo $customer_info->customer_mobile; ?>" class="form-control">
<input type="hidden" name="due_amount" id="due_amount" onFocus="startCalc();" onBlur="stopCalc();" class="form-control">
<input type="hidden" id="customer_due" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $customer_info->customer_due; ?>">
<?php
    }
?>