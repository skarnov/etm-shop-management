<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Search Sale Transaction
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_shop/add_sale_transaction">Add Sale Transaction</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Search Sale Transaction
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?php echo base_url() ?>evis_shop/sale_transaction_search" method="POST">
                            <div class="input-group" style="margin-top: 4%;">
                                <input class="form-control" id="system-search" name="text" placeholder="Enter Sale Transaction ID" required>
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
                            <th>Date</th>
                            <th class="btn-danger">Due</th>
                            <th>Customer ID</th>
                            <th>Net Amount</th>
                            <th>Paid Amount</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($search_sale_transaction as $v_sale_transaction)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_sale_transaction->sale_transaction_id;?></td>
                                <td><?php echo $v_sale_transaction->transaction_date;?></td>
                                <td class="btn-danger"><?php echo $v_sale_transaction->due_amount;?></td>
                                <td><?php echo $v_sale_transaction->customer_input_id;?></td>
                                <td><?php echo $v_sale_transaction->net_amount;?></td>
                                <td><?php echo $v_sale_transaction->paid_amount;?></td>                            
                                <td>
                                    <a href="<?php echo base_url();?>evis_shop/print_sale_transaction/<?php echo $v_sale_transaction->sale_transaction_id;?>" class="btn btn-info" data-toggle="tooltip" title="Print Sale Transaction"><i class="fa fa-print"></i></a>
                                    <a href="<?php echo base_url();?>evis_shop/delete_sale_transaction/<?php echo $v_sale_transaction->sale_transaction_id;?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Sale Transaction" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                              <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>