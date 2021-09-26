<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $title; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            function check_delete()
            {
                var chk = confirm('Are You Want To Delete This');
                if (chk)
                {
                    return true;
                } else
                {
                    return false;
                }
            }
        </script> 
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">EMT Shop Management</a>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php
                        $Today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?></a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li><a href="<?php echo base_url(); ?>evis_shop/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>evis_shop"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Customer Manager<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_shop/add_customer">Add Customer</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_shop/manage_customer">Manage Customer</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Repair Manager<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_shop/add_repair">Add Repair</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_shop/manage_repair">Manage Repair</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_shop/repair_report">Repair Report</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-home fa-fw"></i> Inventory Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_inventory/add_brand">Add Brand</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_inventory/manage_brand">Manage Brand</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_inventory/add_model">Add Model</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_inventory/manage_model">Manage Model</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_inventory/add_inventory">Add Inventory</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_inventory/manage_inventory">Manage Inventory</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_inventory/total_inventory">Total Inventory</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-home fa-fw"></i>Sales Manager<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_shop/add_sales">New Sales</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>cart/show_cart">Shopping Cart</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_shop/manage_sales">Manage Sales</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_shop/add_sale_transaction">Add Sale Transaction</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_shop/manage_sale_transaction">Manage Sale Transaction</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>evis_shop/sale_report">Sales Report</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php echo $dashboard; ?>
        </div>
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>js/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>js/sb-admin-2.js"></script>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>