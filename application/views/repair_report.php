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
                <form action="<?php echo base_url() ?>evis_shop/search_repair_report" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" name="from" class="form-control" value="<?php echo date("d-m-Y", time() - 86400); ?>">
                        </div>       
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="text" name="to" class="form-control" value="<?php echo date("d-m-Y", time()); ?>">
                        </div>       
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>