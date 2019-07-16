<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perpustakaan Online</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/AdminLTE.min.css">
    <!-- select 2  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
        .select2-container--default .select2-selection--single {
            height: 35px !important;
            padding: 10px 4px;
            font-size: 14px;
            line-height: 1;
            border-radius: -2px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 85% !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 26px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #CCC !important;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        }
    </style>


</head>

<body class="hold-transition skin-red sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>P</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>PERL</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </nav>
        </header>

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url(); ?>assets/img/user2-160x160.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->session->userdata('username'); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="li-link">
                        <a href="<?= base_url('Akun'); ?>">
                            <i class="fa fa-folder"></i> <span>Akun</span>
                        </a>
                    </li>
                    <li class="li-link">
                        <a href="<?= base_url('Anggota'); ?>">
                            <i class="fa fa-folder"></i> <span>Anggota</span>
                        </a>
                    </li>
                    <li class="li-link">
                        <a href="<?= base_url('Katalog_Buku'); ?>">
                            <i class="fa fa-folder"></i> <span>Katalog Buku</span>
                        </a>
                    </li>
                    <li class="li-link">
                        <a href="<?= base_url('Kategori'); ?>">
                            <i class="fa fa-folder"></i> <span>Kategori</span>
                        </a>
                    </li>
                    <li class="li-link">
                        <a href="<?= base_url('Lokasi'); ?>">
                            <i class="fa fa-folder"></i> <span>Lokasi</span>
                        </a>
                    </li>
                    <li class="li-link">
                        <a href="<?= base_url('Pustakawan'); ?>">
                            <i class="fa fa-folder"></i> <span>Pustakawan</span>
                        </a>
                    </li>
                    <li class="li-link">
                        <a href="<?= base_url('Peminjaman'); ?>">
                            <i class="fa fa-folder"></i> <span>Peminjaman</span>
                        </a>
                    </li>
                    <li class="li-link">
                        <a href="<?= base_url('Pengunjung/akses'); ?>">
                            <i class="fa fa-folder"></i> <span>Pengunjung</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Auth/logout'); ?>">
                            <i class="fa fa-sign-out"></i> <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>