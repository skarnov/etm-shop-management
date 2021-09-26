<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Repair Report
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
                    Repair Report
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
                        <h1 class="btn-danger">Due: <?php echo $total_report->repair_due; ?></h1>
                        <thead>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Repair ID</th>
                            <th>Delivery Date</th>
                            <th>Net Amount</th>
                            <th>Paid Amount</th>
                            <th class="btn-danger">Due Amount</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($repair_report_info as $v_repair)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_repair->customer_input_id;?></td>
                                <td><?php echo $v_repair->customer_name;?></td>
                                <td><?php echo $v_repair->repair_id;?></td>
                                <td><?php echo $v_repair->delivery_date;?></td>
                                <td><?php echo $v_repair->net_amount;?></td>
                                <td><?php echo $v_repair->paid_amount;?></td>
                                <td><?php echo $v_repair->repair_due;?></td>
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