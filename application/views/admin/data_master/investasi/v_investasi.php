<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
        Kriteria Investasi
      </h1>
              <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped text-center">
              <div><a href="<?php echo base_url(); ?>index.php/admin/C_investasi/tambah_data_investasi"><submit class="btn btn-success pull-left">Tambah</submit></a></div><br><br><br>
                <thead>
                 <tr>
                    <th style="width:3%;">No.</th>
                    <th style="width:15%;">ID invesatasi</th>
                    <th style="width:15%;">ID kriteria</th>
                    <th style="width:15%;">Jenjang</th>
                    <th style="width:15%;">Bobot</th>
                    <th style="width:25%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $no = 1;
                  foreach ($daftar_investasi as $tampil) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $tampil->ID_INVESTASI; ?></td>
                  <td><?php echo $tampil->ID_KRITERIA; ?></td>
                  <td><?php echo $tampil->JENJANG_INVESTASI; ?></td>
                  <td><?php echo $tampil->BOBOT_INVESTASI; ?></td>
                  <td align="center">
                      <a href="<?php echo base_url(); ?>index.php/admin/C_investasi/edit_data_investasi/<?php echo $tampil->ID_INVESTASI ?>"><submit class="btn btn-warning">Edit</submit></a>
                      <a href="<?php echo base_url(); ?>index.php/admin/C_investasi/hapus_data_investasi/<?php echo $tampil->ID_INVESTASI ?>" onclick="return confirm('ANDA YAKIN say ... ?')"><submit class="btn btn-danger">Hapus</submit></a>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version 2017</b> 
    </div>
    <strong>Copyright &copy; 2017 <a href="<?php echo base_url(); ?>assets/http://belater@sukses.com"></a>.</strong>
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