<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/images/')?>" type="image/x-icon">
    <title><?php echo $title?></title>
    <!-------------------------------------CSS PART----------------------------------->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap-select/css/bootstrap-select.css');?>" rel="stylesheet" />
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/plugins/node-waves/waves.css');?>" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/plugins/animate-css/animate.css');?>" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="<?php echo base_url('assets/plugins/morrisjs/morris.css');?>" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')?>" rel="stylesheet" />
    <!-- Wait Me Css -->
    <link href="<?php echo base_url('assets/plugins/waitme/waitMe.css')?>" rel="stylesheet" />
    <!-- Bootstrap Tagsinput Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css');?>" rel="stylesheet">
    <!-- Dropify Css -->
    <link href="<?php echo base_url('assets/plugins/dropify/dropify.css')?>" rel="stylesheet">
    <!-- Bootstrap Spinner Css -->
    <link href="<?php echo base_url('assets/plugins/jquery-spinner/css/bootstrap-spinner.css')?>" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap-select/css/bootstrap-select.css')?>" rel="stylesheet" />
    <!-- noUISlider Css -->
    <link href="<?php echo base_url('assets/plugins/nouislider/nouislider.min.css')?>" rel="stylesheet" />
    <!-- Sweet Alert Css -->
    <link href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css')?>" rel="stylesheet" />
    <!-- Jquery UI Css -->
    <link href="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.css')?>" rel="stylesheet" />
    <!-- Daterangepicker Css -->
    <link href="<?php echo base_url('assets/css/daterangepicker.css')?>" rel="stylesheet" />
    <!---Materialize CSS--->
    <link href="<?php echo base_url('assets/css/materialize.css') ?>" rel="stylesheet">
    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/css/style.min.css');?>" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets/css/themes/all-themes.min.css');?>" rel="stylesheet" />

    <style>
        a {
            text-decoration:none;
        }
        a:hover {
            text-decoration:none;
        }
        a:active{
            text-decoration:none;
        }
    </style>

    <!-----------------------------Javascript Part-------------------------------------->
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.js');?>"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.js');?>"></script>
    <!-- Select Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js');?>"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js');?>"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/node-waves/waves.js');?>"></script>
    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-countto/jquery.countTo.js');?>"></script>
    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/raphael/raphael.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/morrisjs/morris.js');?>"></script>
    <!-- ChartJs -->
    <script src="<?php echo base_url('assets/plugins/chartjs/Chart.bundle.js');?>"></script>
    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.resize.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.pie.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.categories.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.time.js');?>"></script>
    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-sparkline/jquery.sparkline.js');?>"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/jquery.dataTables.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/jszip.min.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js')?>"></script>
    <!-- Input Mask Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js')?>"></script>
    <!-- Dropify Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/dropify/dropify.js')?>"></script>
    <!-- Multi Select Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/multi-select/js/jquery.multi-select.js')?>"></script>
    <!-- Jquery Spinner Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-spinner/js/jquery.spinner.js')?>"></script>
    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')?>"></script>
    <!-- noUISlider Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/nouislider/nouislider.js')?>"></script>
    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/autosize/autosize.js')?>"></script>
    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/momentjs/moment.js')?>"></script>
    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.js')?>"></script>
    <!-- JQuery Steps Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-steps/jquery.steps.js')?>"></script>
    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js')?>"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')?>"></script>
    <!---Jquery Autocomplete---->
    <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery.autocomplete.min.js')?>"></script>
    <!---Jquery UI---->
    <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.js')?>"></script>
    <!---Daterangepicker---->
    <script src="<?php echo base_url('assets/js/daterangepicker.js')?>"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/js/admin.js');?>"></script>
</head>

<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo base_url()?>"><label class="form-label">Billing System</label></a>
        </div>
    </div>
</nav>
<!-- #Top Bar -->

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo base_url('assets/images/user.png')?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</div>
                <div class="email">admin@admin.com</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div id="sidebar-menu">
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if($this->uri->segment(1)=="") echo ' class="active"'; ?>>
                        <a href="<?php echo base_url();?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li <?php if($this->uri->segment(2)=="page") echo ' class="active"'; ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">face</i>
                            <span>Master Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($this->uri->segment(3)=="agent"){echo ' class="active"';}?>><a href="<?php echo base_url("master/page/agent");?>">Data Agent</a></li>
                            <li <?php if($this->uri->segment(3)=="bank"){echo ' class="active"';}?>><a href="<?php echo base_url("master/page/bank");?>">Data Bank</a></li>
                            <li <?php if($this->uri->segment(3)=="city"){echo ' class="active"';}?>><a href="<?php echo base_url("master/page/city");?>">Data Kota</a></li>
                            <li <?php if($this->uri->segment(3)=="container"){echo ' class="active"';}?>><a href="<?php echo base_url("master/page/container");?>">Data Kontainer</a></li>
                            <li <?php if($this->uri->segment(3)=="driver"){echo ' class="active"';}?>><a href="<?php echo base_url("master/page/driver");?>">Data Supir</a></li>
                            <li <?php if($this->uri->segment(3)=="receiver"){echo ' class="active"';}?>><a href="<?php echo base_url("master/page/receiver");?>">Data Penerima</a></li>
                            <li <?php if($this->uri->segment(3)=="route"){echo ' class="active"';}?>><a href="<?php echo base_url("master/page/route");?>">Data Rute</a></li>
                            <li <?php if($this->uri->segment(3)=="shipper"){echo ' class="active"';}?>><a href="<?php echo base_url("master/page/shipper");?>">Data Pengirim</a></li>
                            <li <?php if($this->uri->segment(3)=="truck"){echo ' class="active"';}?>><a href="<?php echo base_url("master/page/truck");?>">Data Truk</a></li>
                        </ul>
                    </li>
                    <li <?php if($this->uri->segment(2)=="cost") echo ' class="active"'; ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">dns</i>
                            <span>Biaya</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($this->uri->segment(3)=="cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/cuti");?>">Daftar Pengajuan Cuti Pegawai</a></li>
                            <li <?php if($this->uri->segment(3)=="persetujuan_cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/persetujuan_cuti");?>">Persetujuan Cuti Pegawai</a></li>
                            <li <?php if($this->uri->segment(3)=="dokumen_cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/dokumen_cuti");?>">Dokumen Cuti Pegawai</a></li>
                            <li <?php if($this->uri->segment(3)=="rekap_cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/rekap_cuti");?>">Rekap Cuti Pegawai</a></li>
                        </ul>                           
                    </li>
                    <li <?php if($this->uri->segment(2)=="invoice") echo ' class="active"'; ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_balance_wallet</i>
                            <span>Invoice</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($this->uri->segment(3)=="cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/cuti");?>">Daftar Pengajuan Cuti Pegawai</a></li>
                            <li <?php if($this->uri->segment(3)=="persetujuan_cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/persetujuan_cuti");?>">Persetujuan Cuti Pegawai</a></li>
                            <li <?php if($this->uri->segment(3)=="dokumen_cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/dokumen_cuti");?>">Dokumen Cuti Pegawai</a></li>
                            <li <?php if($this->uri->segment(3)=="rekap_cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/rekap_cuti");?>">Rekap Cuti Pegawai</a></li>
                        </ul>
                    </li>
                    <li <?php if($this->uri->segment(2)=="payment") echo ' class="active"'; ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_balance</i>
                            <span>Pembayaran</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($this->uri->segment(3)=="cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/cuti");?>">Daftar Pengajuan Cuti Pegawai</a></li>
                            <li <?php if($this->uri->segment(3)=="persetujuan_cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/persetujuan_cuti");?>">Persetujuan Cuti Pegawai</a></li>
                            <li <?php if($this->uri->segment(3)=="dokumen_cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/dokumen_cuti");?>">Dokumen Cuti Pegawai</a></li>
                            <li <?php if($this->uri->segment(3)=="rekap_cuti"){echo ' class="active"';}?>><a href="<?php echo base_url("master/cuti/rekap_cuti");?>">Rekap Cuti Pegawai</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                DEV_RAGRIN &copy; <?php echo date('Y');?>
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0.beta
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>