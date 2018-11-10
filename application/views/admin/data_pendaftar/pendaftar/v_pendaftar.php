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
        Data pendaftar ikm
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">pendaftaran</li>
      </ol>
    </section>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped text-center">
              <div>
              <a href="<?php echo base_url(); ?>index.php/admin/C_pendaftar/tambah_data_pendaftar"><submit class="btn btn-success pull-left">Tambah</submit></a>
              <a href="<?php echo base_url(); ?>index.php/admin/C_pendaftar/topsis"><submit class="btn btn-primary pull-right">Rangking</submit></a>
              </div><br><br><br>
                <thead>
                  <tr>
                    <th style="width:3%;">No.</th>
                    <th style="width:5%;">Id pendaftar</th>
                    <th style="width:10%;">Nama perusahaan</th>
                    <th style="width:15%;">Nama pemilik perusahaan</th>
                    <th style="width:10%;">Alamat perusahaan</th>
                    <th style="width:15%;">Nomor telepon perusahaan</th>
                    <th style="width:5%;">Status</th>
                    <th style="width:15%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $no = 1;
                  foreach ($daftar_pendaftar as $tampil) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $tampil->ID_PENDAFTAR; ?></td>
                  <td><?php echo $tampil->NAMA_PERUSAHAAN; ?></td>
                  <td><?php echo $tampil->NAMA_PEMILIK_PERUSAHAAN; ?></td>
                  <td><?php echo $tampil->ALAMAT_PERUSAHAAN; ?></td>
                  <td><?php echo $tampil->NOMOR_TELEPON_PERUSAHAAN; ?></td>
                  <td><?php
                    if($tampil->STATUS==0){
                        echo '<a href = '.base_url().'index.php/admin/C_pendaftar/ganti_status_rangking/'.$tampil->ID_PENDAFTAR.'/'.$tampil->STATUS.'><button type="button" class="btn btn-default">Tidak</button> </a>';
                    }else{
                        echo '<a href = '.base_url().'index.php/admin/C_pendaftar/ganti_status_rangking/'.$tampil->ID_PENDAFTAR.'/'.$tampil->STATUS.'><button type="button" class="btn btn-success">Aktif</button></a>';
                    } ?>

                  </td>


                  <td align="center">
                      <a href="<?php echo base_url(); ?>index.php/admin/C_pendaftar/edit_data_pendaftar/<?php echo $tampil->ID_PENDAFTAR ?>"><submit class="btn btn-warning">Edit</submit></a>
                      <a href="<?php echo base_url(); ?>index.php/admin/C_pendaftar/hapus_data_pendaftar/<?php echo $tampil->ID_PENDAFTAR ?>" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA INI ... ?')"><submit class="btn btn-danger">Hapus</submit></a>
                      <a href="<?php echo base_url(); ?>index.php/admin/C_pendaftar/detail_data_pendaftar/<?php echo $tampil->ID_PENDAFTAR ?>"><submit class="btn btn-success">Detail</submit></a>
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
    <strong>Copyright &copy; Ainul Yaqin <a href="<?php echo base_url(); ?>assets/http://dedyadi87@gmail.com"></a>.</strong>
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