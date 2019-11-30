<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no,shrink-to-fit=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/datatables.net-bs/css/fixedColumns.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/datatables.net-bs/css/fixedColumns.bootstrap.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Bootstrap Button -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/datatable-buttons/buttons.dataTables.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/select2/dist/css/select2.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    table.dataTable thead th {
      border-top: 1px solid black !important;
      border-left: 1px solid black !important;
      border-right: 1px solid black !important;
    }

    table.dataTable tfoot th {
      border-bottom: 1px solid black !important;
      border-left: 1px solid black !important;
      border-right: 1px solid black !important;
    }

    table.dataTable tbody td {
      border: 1px solid black !important;
    }

    .select2-container {
        width: 100% !important;
        padding: 0;
    }
  </style>
  <!-- jQuery 3 -->
  <script src="<?php echo base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url()?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url()?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url()?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url()?>/assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url()?>/assets/dist/js/demo.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url()?>/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Morris.js charts -->
  <script src="<?php echo base_url()?>/assets/bower_components/raphael/raphael.min.js"></script>
  <script src="<?php echo base_url()?>/assets/bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url()?>/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url()?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url()?>/assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url()?>/assets/bower_components/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url()?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url()?>/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url()?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url()?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url()?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- Datatables -->
  <script src="<?php echo base_url()?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>/assets/bower_components/datatables.net/js/dataTables.fixedColumns.min.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url()?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url()?>/assets/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/jquery-mask/jquery.mask.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?php echo base_url()?>/assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="<?php echo base_url()?>/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url()?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?php echo base_url()?>/assets/plugins/iCheck/icheck.min.js"></script>
  <!-- Sweetalert 2 -->
  <script src="<?php echo base_url()?>/assets/plugins/sweetalert2/dist/sweetalert2.all.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11 -->
  <script src="<?php echo base_url()?>/assets/plugins/sweetalert2/dist/polyfill.js"></script>
  <!-- Plugin Button For Datatables-->
  <script src="<?php echo base_url()?>/assets/plugins/datatable-buttons/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/datatable-buttons/buttons.flash.min.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/datatable-buttons/jszip.min.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/datatable-buttons/pdfmake.min.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/datatable-buttons/vfs_fonts.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/datatable-buttons/buttons.html5.min.js"></script>
  <script src="<?php echo base_url()?>/assets/plugins/datatable-buttons/buttons.print.min.js"></script>
  
  
</head>
<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="<?php echo site_url()?>" class="navbar-brand"><b>BILL System</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li ><a href="<?php echo site_url()?>">Home <span class="sr-only">(current)</span></a></li>
              <li <?php if($this->uri->segment(2)=="master"){echo ' class="active"';}?> class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url("main/master/agent");?>">Data Agen</a></li>
                    <li><a href="<?php echo site_url("main/master/bank");?>">Data Bank</a></li>
                    <li><a href="<?php echo site_url("main/master/city");?>">Data Kota</a></li>
                    <li><a href="<?php echo site_url("main/master/driver");?>">Data Supir</a></li>
                    <li><a href="<?php echo site_url("main/master/receiver");?>">Data Penerima</a></li>
                    <li><a href="<?php echo site_url("main/master/route");?>">Data Daftar Gaji</a></li>
                    <li><a href="<?php echo site_url("main/master/shipper");?>">Data Pengirim</a></li>
                    <li><a href="<?php echo site_url("main/master/truck");?>">Data Truk</a></li>
                    <li><a href="<?php echo site_url("main/master/document");?>">Data Jenis Document</a></li>
                </ul>
              </li>
              <li <?php if($this->uri->segment(2)=="document"){echo ' class="active"';}?> class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dokumen Kapal <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="nav-item"><a href="<?php echo site_url("main/document/shipment_doc");?>" class="nav-link">Dokumen Kapal</a></li>
                    <li class="nav-item"><a href="<?php echo site_url("main/document/doring");?>" class="nav-link">Doring</a></li>
                </ul>
              </li>
              <li <?php if($this->uri->segment(2)=="history"){echo ' class="active"';}?> class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">History Data <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="nav-item"><a href="<?php echo site_url("main/history/shipment_doc");?>" class="nav-link">History Dokumen Kapal</a></li>
                    <li class="nav-item"><a href="<?php echo site_url("main/history/doring");?>" class="nav-link">History Doring</a></li>
                </ul>
              </li>
              <li <?php if($this->uri->segment(2)=="cost"){echo ' class="active"';}?> class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Biaya <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="nav-item"><a href="<?php echo site_url("main/cost/main_cost");?>" class="nav-link">Biaya Dokumen</a></li>
                </ul>
              </li>
              <li <?php if($this->uri->segment(2)=="report"){echo ' class="active"';}?> class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="nav-item"><a href="<?php echo site_url("main/report/gaji_driver");?>" class="nav-link">Laporan Gaji Driver</a></li>
                    
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo base_url()?>/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="row">
                      <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                      </div>
                    </div>
                    <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header><br><br>