<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php
  $id_user = $this->session->userdata('id');
  $user = $this->db->query("select * from pengguna
    where pengguna_id='$id_user'")->row();
    ?>
    <title>TRIFFBOOK</title>
    <link href="<?php echo base_url();?>assets/dist/img/jamkrida2.png" rel="icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
  .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
  }

  .example-modal .modal {
    background: transparent !important;
  }
</style>
</head>
<?php
if($this->session->userdata('level') == "admin"){     ?> 
 <body class="hold-transition skin-purple sidebar-mini"> 
 <?php } ?>
 <?php
 if($this->session->userdata('level') == "nasabah"){     ?> 
   <body class="hold-transition skin-red light sidebar-mini"> 
   <?php } ?>
   <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="<?php echo base_url().'dashboard' ?>" class="logo">
          <span class="logo-mini"><b>TR</b></span>
          <span class="logo-lg"><b>TRIFF</b>BOOK</span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu"
          role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               
                <img src="<?php echo base_url();?>assets/dist/img/jamkrida2.png" class="user-image" alt="User Image">
              
              <span class="hidden-xs">HAK AKSES :
                <b><?php echo $this->session->userdata('level') ?></b></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  
                    <img src="<?php echo base_url();?>assets/dist/img/jamkrida2.png"class="img-circle" alt="User Image">
                  <p>
                    <?php echo $this->session->userdata('username') ?>
                    <small>Hak akses :
                      <?php echo $this->session->userdata('level') ?></small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo
                      base_url().'dashboard/profil' ?>" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url().'dashboard/keluar' ?>" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
               <img src="<?php echo base_url(); ?>assets/img/avatar/user.png" class="img-circle" alt="User Image">
             </div>
           <div class="pull-left info">
            <?php
            $id_user = $this->session->userdata('id');
            $user = $this->db->query("select * from pengguna
              where pengguna_id='$id_user'")->row();
              ?>
              <p><?php echo $user->pengguna_nama; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i>
              Online</a>
            </div>
          </div>
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo base_url().'dashboard' ?>">
                <i class="fa fa-dashboard"></i>
                <span>DASHBOARD</span>
              </a>
            </li>


            <?php
            if($this->session->userdata('level') == "admin"){
//tampilkan menu
              ?>
              <!-- Master Data -->   
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-cloud"></i>
                  <span>Master Data</span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right"></span>
                  </span>
                </a>
                <ul class="treeview-menu">
                <!-- <li>
                    <a href="<?php echo base_url().'dashboard/tes'
                    ?>">
                    <i class="fa fa-bookmark-o"></i>
                    <span>Tes</span>
                  </a>
                </li> -->
                  <li>
                    <a href="<?php echo base_url().'dashboard/buku'
                    ?>">
                    <i class="fa fa-window-restore"></i>
                    <span>Data buku</span>
                  </a>
                </li>
                  <li>
                    <a href="<?php echo base_url().'dashboard/event'
                    ?>">
                    <i class="fa fa-bookmark-o"></i>
                    <span>Event</span>
                  </a>
                </li>
                  <li>
                    <a href="<?php echo base_url().'dashboard/saldobank'
                    ?>">
                    <i class="fa fa-dollar"></i>
                    <span>Set Saldo TRIFFBOOK</span>
                  </a>
                </li>
                  <li>
                    <a href="<?php echo base_url().'dashboard/saranlist'
                    ?>">
                    <i class="fa fa-envelope-o "></i>
                    <span>Saran & Masukan</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url().'dashboard/pengguna' ?>"><i class="fa fa-edit"></i> <span>Data Pengguna & Hak Akses</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Transaksi Menu -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i>
                <span>Transaksi</span>
                <span class="pull-right-container">
                  <span class="label label-primary pull-right"></span>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url().'dashboard/jual' ?>">
                    <i class="fa fa-book"></i>
                    <span>Jual Buku</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url().'dashboard/setor' ?>">
                    <i class="fa fa-book"></i>
                    <span>Beli Buku</span>
                  </a>
                </li>
                <li>
                <a href="<?php echo base_url().'dashboard/penawaran_admin' ?>">
                  <i class="fa fa-paper-plane "></i>
                  <span>Penawaran Buku</span>
                </a>
              </li>
                <li>
                  <a href="<?php echo base_url().'dashboard/tarik' ?>">
                    <i class="fa fa-upload"></i>
                    <span>Penarikan Saldo</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url().'dashboard/returlist' ?>">
                    <i class="fa fa-share"></i>
                    <span>Data Retur</span>
                  </a>
                </li>
              </a></li>
            </ul>
          </li>
          <?php
        } ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <?php
              if($this->session->userdata('level') == "admin"){
                ?> 
                <span class="label label-primary pull-right"></span>
              <?php } else { ?>
                <span class="label label-primary pull-right">1</span>
              <?php } ?>
            </span>
          </a>
          <ul class="treeview-menu">
           <?php
           if($this->session->userdata('level') == "admin"){
            ?> 
            <!-- Hanya Tampil Di Admin -->
            <li><a  href="http://localhost/triffbook/grafik/grafik_pendaftaran.php" target="_blank"><i class="fa fa-users"></i><span>Pendaftaran On/Offline</span></a></li>
            <li><a href="<?php echo base_url().'dashboard/report_bukularis' ?>" target="_blank"><i class="fa fa-book"></i><span>Buku Terlaris</span></a></li>
            <li><a href="<?php echo base_url().'dashboard/report_buku' ?>"><i class="fa fa-book"></i><span>Setoran buku</span></a></li>
            <li><a href="<?php echo base_url().'dashboard/report_tarik' ?>"><i class="fa fa-money"></i><span>Penarikan Saldo</span></a></li>
            <li><a href="<?php echo base_url().'dashboard/report_stok' ?>"><i class="fa fa-archive"></i><span>Ketersediaan Stok buku</span></a></li>
            <li><a href="<?php echo base_url().'dashboard/report_penjualan' ?>"><i class="fa fa-dollar"></i><span>Penjualan</span></a></li>
            <li><a href="<?php echo base_url().'dashboard/report_untungrugi'?>"><i class="fa fa-area-chart"></i><span>Laporan Keuangan</span></a></li>
            <li><a href="<?php echo base_url().'dashboard/report_keaktifan'?>"><i class="fa fa-tasks"></i><span>Keaktifan Pelanggan</span></a></li>
            <li><a href="<?php echo base_url().'dashboard/report_event'?>" target="_blank"><i class="fa fa-bar-chart"></i><span>Laporan Event</span></a></li>
          <?php }?>
          <!-- Tampil Disemua User -->
          <li><a href="<?php echo base_url().'dashboard/report_koran' ?>"><i class="fa fa-cc"></i><span>Koran (Transaksi & Saldo)</span></li>
          </a></li>
        </ul>
      </li>
      <?php
           if($this->session->userdata('level') == "nasabah"){
            ?> 
        <li>
          <a href="<?php echo base_url().'dashboard/tarik_saldo_pengguna' ?>">
            <i class="fa fa-dollar"></i>
            <span>Tarik</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'dashboard/saran' ?>">
            <i class="fa fa-envelope-o "></i>
            <span>Saran & Masukan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'dashboard/penawaran' ?>">
            <i class="fa fa-paper-plane "></i>
            <span>Tawarkan Buku</span>
          </a>
        </li>
      <?php }?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-wrench"></i>
          <span>Pengaturan Pengguna</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right"></span>                  
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url().'dashboard/profil' ?>"><i class="fa fa-user"></i><span>PROFIL</span></li>
            <li><a href="<?php echo base_url().'dashboard/ganti_password' ?>"><i class="fa fa-lock"></i><span>GANTI PASSWORD</span>
            </a></li>
          </ul>
        </li>

        <!-- Report -->
        

        <li>
          <a href="<?php echo base_url().'dashboard/keluar' ?>">
            <i class="fa fa-share"></i>
            <span>KELUAR</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>