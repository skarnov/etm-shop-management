<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-title">
                Manage Brand
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <span class="divider"></span>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>evis_inventory/add_brand">Add Brand</a>
                    <span class="divider"></span>
                </li>
                <li class="active">
                    Manage Brand
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('update_brand');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('update_brand');
                    }
                    ?>
                </h3>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>Brand Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_brand as $v_brand)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_brand->brand_name;?></td>
                                <td>
                                    <a href="<?php echo base_url();?>evis_inventory/edit_brand/<?php echo $v_brand->brand_id;?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Brand"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url();?>evis_inventory/delete_brand/<?php echo $v_brand->brand_id;?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Brand" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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