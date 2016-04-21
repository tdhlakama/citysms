<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>City SMS Tool</title>
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/bootstrap.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/datatables.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/jquery-ui.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/buttons.dataTables.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/buttons.bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/sb-admin.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/rs.css"); ?>">
    <script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-1.11.3.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/datatables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/dataTables.buttons.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/buttons.bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/buttons.colVis.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/jsbuttons.print.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("/assets/js/bootstrap.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("/assets/js/chart.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("/assets/js/rs.js"); ?>"></script>
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('home'); ?>">City SMS Service</a>
        </div>

        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <form action="<?php echo base_url(); ?>index.php/graduate/search" method="post"
                  class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" name="keyword" placeholder="Enter Customer Name" class="form-control"/>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                </div>
            </form>

            <?php
            $checkUsername = $this->session->userdata('username');

            if (isset($checkUsername)) {
                echo '<li><a href="javascript: change_password();">User: ' . $this->session->userdata('username') . ' </a></li>';
                echo '<li><i class="fa fa-fw fa-power-off"></i><a href="javascript: logout();">Log Out</a></li>';
            }
            ?>


        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">

                <li class="<?php echo active_link('home'); ?>">
                    <a href="<?php echo site_url('home'); ?>">Home</a>
                </li>

                <li class="<?php echo active_link('customer'); ?>">
                    <a href="<?php echo base_url(); ?>index.php/customer/listAll"></i>Customers</a>
                </li>

                <li class="<?php echo active_link('customer'); ?>">
                    <a href="<?php echo base_url(); ?>index.php/customer/upload"></i>Upload Entries</a>
                </li>

                <li class="<?php echo active_link('customer'); ?>">
                    <a href="<?php echo base_url(); ?>index.php/customer/sendSMS"></i>Send</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

