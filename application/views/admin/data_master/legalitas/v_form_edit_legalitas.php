<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN</title>
  <?php $this->load->view('plugins_atas') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('header') ?>
  <?php $this->load->view('sidebar') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Legalitas Usaha
      </h1>
   
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Edit Data legalitas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= base_url('index.php/admin/C_legalitas/proses_edit_data_legalitas')?>" method="POST" class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">ID legalitas</label>

                  <div class="col-sm-10">
                    <input name="id_legalitas_usaha" readonly value="<?= $legalitas_usaha->ID_LEGALITAS_USAHA ?>" type="text" class="form-control" placeholder="Masukkan ID woyyyy">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">ID kriteria</label>

                  <div class="col-sm-10">
                    <input name="id_kriteria" readonly value="<?= $legalitas_usaha->ID_KRITERIA ?>" type="text" class="form-control" placeholder="Masukkan ID woyyyy">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Jenjang</label>

                  <div class="col-sm-10">
                    <input name="jenjang_legalitas_usaha" value="<?= $legalitas_usaha->JENJANG_LEGALITAS_USAHA ?>" type="text" class="form-control" placeholder="Masukkan " required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nilai</label>

                  <div class="col-sm-10">
                    <input name="bobot_legalitas_usaha" value="<?= $legalitas_usaha->BOBOT_LEGALITAS_USAHA ?>" type="text" class="form-control" placeholder="Masukkan " required>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/C_legalitas"><submit class="btn btn-default pull-left">Kembali</submit></a>
                <button type="submit" class="btn btn-info pull-left">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version 2017</b> 
    </div>
    <strong>Copyright &copy; 2017 <a href="<?php echo base_url(); ?>assets/http://Belater@sukses.com"></a>.</strong>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->

          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view('plugins') ?>
</body>
</html>