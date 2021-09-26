<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Manage Sales
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_shop/add_sales">Add Sales</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Manage Sales
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                 <div class="row">
                    <div class="col-md-6">
                        <form action="<?php echo base_url() ?>evis_shop/sale_search" method="POST">
                            <div class="input-group" style="margin-top: 4%;">
                                <input class="form-control" id="system-search" name="text" placeholder="Enter Sales ID" required>
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
                            <th>Customer Name</th>
                            <th class="btn-danger">Sale Due</th>
                            <th>Sale Discount</th>
                            <th>Sale Grand Total</th>
                            <th>Paid Amount</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_sales as $v_sale)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_sale->sale_id;?></td>
                                <td><?php echo $v_sale->transaction_date;?></td>
                                <td><?php echo $v_sale->customer_name;?></td>
                                <td class="btn-danger"><?php echo $v_sale->sale_due;?></td>
                                <td><?php echo $v_sale->sale_discount;?></td>
                                <td><?php echo $v_sale->grand_total;?></td>
                                <td><?php echo $v_sale->paid_amount;?></td>
                                <td>
                                    <a href="<?php echo base_url();?>evis_shop/all_sale_transaction/<?php echo $v_sale->sale_id; ?>" class="btn btn-success" data-toggle="tooltip" title="All Transaction"><i class="fa fa-money"></i></a>
                                    <a href="<?php echo base_url();?>evis_shop/delete_sale/<?php echo $v_sale->sale_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Sales" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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