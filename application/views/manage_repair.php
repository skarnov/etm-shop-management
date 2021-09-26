<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Manage Repair
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_shop/add_repair">Add Repair</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Manage Repair
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('update_repair');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('update_repair');
                    }
                    ?>
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?php echo base_url() ?>evis_shop/repair_search" method="POST">
                            <div class="input-group" style="margin-top: 4%;">
                                <input class="form-control" id="system-search" name="text" placeholder="Enter Repair ID, IMEI, Mobile" required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div><br/>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Net Amount</th>
                            <th>Last Paid</th>
                            <th class="btn-danger">Due</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>IMEI</th>
                            <th>Item</th>
                            <th>Delivery</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_repair as $v_repair)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_repair->repair_id;?></td>
                                <td><?php echo $v_repair->net_amount;?></td>
                                <td><?php echo $v_repair->paid_amount;?></td>
                                <td class="btn-danger"><?php echo $v_repair->repair_due;?></td>
                                <td><?php echo $v_repair->customer_name;?></td>
                                <td><?php echo $v_repair->customer_mobile;?></td>
                                <td><?php echo $v_repair->imei;?></td>
                                <td><?php echo $v_repair->item_name. $v_repair->model_no;?></td>
                                <td><?php echo $v_repair->delivery_date;?></td>
                                <td>
                                    <div style="color:green;">
                                        <?php
                                            if($v_repair->delivery_status=='1') {
                                                echo 'Delivered';
                                            }
                                        ?>
                                        <div style="color:peru;">    
                                            <?php
                                                if($v_repair->delivery_status=='2') {
                                                    echo 'Delivered But Not OK';
                                                }
                                            ?>   
                                        </div>    
                                        <div style="color:red;">    
                                            <?php
                                                if($v_repair->delivery_status==0) {
                                                    echo 'Undelivered';
                                                }
                                            ?>   
                                        </div>    
                                    </div>
                                </td>                              
                                <td>
                                    <a href="<?php echo base_url();?>evis_shop/print_repair/<?php echo $v_repair->repair_id;?>" class="btn btn-success" data-toggle="tooltip" title="Print Repair"><i class="fa fa-print"></i></a>
                                    <a href="<?php echo base_url();?>evis_shop/edit_repair/<?php echo $v_repair->repair_id;?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Repair"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url();?>evis_shop/delete_repair/<?php echo $v_repair->repair_id;?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Repair" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                              <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <?php echo $this->pagination->create_links();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>