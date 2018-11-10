<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>ADMIN</p>
          
        </div>
      </div>
      <!-- search form -->
      <form action="" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="<?php echo base_url(); ?>index.php/admin/home">
            <i class="fa fa-fw fa-home"></i> <span>HOME</span>
    

            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-th"></i> <span>INDIKATOR</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="#"><i class="glyphicon glyphicon-list-alt"></i> Kriteria <i class="fa fa-angle-left pull-right"></i></a>
                 <ul class="treeview-menu">
                  <li><a href="<?php echo base_url();?>index.php/admin/C_kriteria"><i class="glyphicon glyphicon-triangle-right"></i> View Kriteria</a></li>
                    <li>
                      <a href="#"><i class="glyphicon glyphicon-triangle-right"></i> Subkriteria <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                         <li><a href="<?php echo base_url();?>index.php/admin/C_investasi"><i class="fa fa-fw fa-caret-right"></i> Investasi</a></li>
                         <li><a href="<?php echo base_url();?>index.php/admin/C_sdm"><i class="fa fa-fw fa-caret-right"></i> SDM</a></li>
                         <li><a href="<?php echo base_url();?>index.php/admin/C_legalitas"><i class="fa fa-fw fa-caret-right"></i> Legalitas</a></li>
                         <li><a href="<?php echo base_url();?>index.php/admin/C_izin"><i class="fa fa-fw fa-caret-right"></i> Izin industri</a></li>
                         <li><a href="<?php echo base_url();?>index.php/admin/C_sertifikat"><i class="fa fa-fw fa-caret-right"></i> Sertifikat SNI</a></li>
                         <li><a href="<?php echo base_url();?>index.php/admin/C_partisipasi"><i class="fa fa-fw fa-caret-right"></i> Partisipasi</a></li>
                         <li><a href="<?php echo base_url();?>index.php/admin/C_mesin"><i class="fa fa-fw fa-caret-right"></i> Kondisi mesin</a></li>
                         <li><a href="<?php echo base_url();?>index.php/admin/C_ketersediaan"><i class="fa fa-fw fa-caret-right"></i> Ketersediaan mesin</a></li>
                         <li><a href="<?php echo base_url();?>index.php/admin/C_pembuatan"><i class="fa fa-fw fa-caret-right"></i> Tahun Pembuatan</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

          </ul>
        </li>

        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-file"></i> <span>DATA IKM</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/admin/C_pendaftar"><i class="fa fa-fw fa-file"></i> Data Pendaftar IKM</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-fw fa-refresh"></i> <span>PROSES TOPSIS</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/admin/C_nilaidata"><i class="fa fa-fw fa-spinner"></i> Nilai data</a></li>
            <li><a href="<?php echo base_url();?>index.php/admin/C_normalisasi"><i class="fa fa-fw fa-spinner"></i> Nilai normalisasi</a></li>
            <li><a href="<?php echo base_url();?>index.php/admin/C_bobot"><i class="fa fa-fw fa-spinner"></i> Nilai bobot ternormalisasi</a></li>
            <li><a href="<?php echo base_url();?>index.php/admin/C_solusi_ideal_positif_negatif "><i class="fa fa-fw fa-spinner"></i> Solusi ideal positif negatif</a></li>
            <li><a href="<?php echo base_url();?>index.php/admin/C_rangking"><i class="fa fa-fw fa-spinner"></i> Rangking</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-user"></i> <span>USER</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url();?>index.php/admin/C_user"><i class="fa fa-fw fa-user-plus"></i> user</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>



  <!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
</body>
</html>
