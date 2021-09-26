<option value="">Select Model</option>
<?php
foreach ($all_model as $v_model) {
    ?>
    <option value="<?php echo $v_model->model_id; ?>"><?php echo $v_model->model_name; ?></option>
    <?php
}
?>