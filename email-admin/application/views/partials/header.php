<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>ALI EMAIL ADMIN</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('frontend/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/bootstrap-reset.css') ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('frontend/assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('frontend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') ?>" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url('frontend/css/owl.carousel.css') ?>" type="text/css">

    <?php if(isset($responsive_table) && $responsive_table == true): ?>
    <link href="<?php echo base_url('frontend/css/table-responsive.css'); ?>" rel="stylesheet" />
    <?php endif; ?>
    <?php if(isset($dynamic_table) && $dynamic_table == true): ?>
    <!--dynamic table-->
    <link href="<?php echo base_url('frontend/assets/advanced-datatable/media/css/demo_page.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('frontend/assets/advanced-datatable/media/css/demo_table.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('frontend/assets/data-tables/DT_bootstrap.css'); ?>" />
    <?php endif; ?>
    <!--right slidebar-->
    <link href="<?php echo base_url('frontend/css/slidebars.css') ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend/assets/bootstrap-datepicker/css/datepicker.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend/assets/bootstrap-daterangepicker/daterangepicker-bs3.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend/assets/bootstrap-datetimepicker/css/datetimepicker.css') ?>" />

    <!-- Custom styles for this template -->

    <link href="<?php echo base_url('frontend/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/custom.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/style-responsive.css') ?>" rel="stylesheet" />




    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <i class="fa fa-bars"></i>
              </div>
            <!--logo start-->
            <a href="<?php echo base_url("Emails/Manage"); ?>" class="logo">
                <div class="header-logo">
                  <img src="<?php echo base_url("frontend/logo/ayalaland-logo.jpg"); ?>">
                </div>
            </a>
            <!--logo end-->

            <div class="top-nav ">
                <!--user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-user"></i>
                            <span class="username">Hi <?php echo $_SESSION["name"]; ?>!</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="<?php echo base_url("Login/logout"); ?>"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--user info end-->
            </div>
        </header>
      <!--header end-->
