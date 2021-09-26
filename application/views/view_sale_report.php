<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Sale Report
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_shop/manage_sales">Manage Sale</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Sale Report
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <h1>Net: <?php echo $total_report->net_amount; ?></h1>
                        <h1>Paid: <?php echo $total_report->paid_amount; ?></h1>
                        <h1 class="btn-danger">Due: <?php echo $total_report->due_amount; ?></h1>
                        <thead>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Sale ID</th>
                            <th>Net Amount</th>
                            <th>Paid Amount</th>
                            <th class="btn-danger">Due Amount</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($sale_report_info as $v_sale)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_sale->customer_input_id;?></td>
                                <td><?php echo $v_sale->customer_name;?></td>
                                <td><?php echo $v_sale->sale_id;?></td>
                                <td><?php echo $v_sale->net_amount;?></td>
                                <td><?php echo $v_sale->paid_amount;?></td>
                                <td><?php echo $v_sale->due_amount;?></td>
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