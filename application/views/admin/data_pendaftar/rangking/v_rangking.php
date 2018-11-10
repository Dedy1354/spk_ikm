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
        Data Perangkingan
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
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <select type="text" class="form-control" onChange="document.location.href=this.options[this.selectedIndex].value;">
                      <option value="">- Pilih Aksi -</option>
                      <option value="<?php echo base_url(); ?>index.php/admin/C_rangking/export_excel_nilai_akhir">Export Excel</option>
                    </select>
                  </div>
                </div>
              <br><br>
                <thead>
                  <tr>
                    <th style="width:5%;">No</th>
                    <th style="width:10%;">Id pendaftar</th>
                    <th style="width:10%;">nama perusahaan</th>
                    <th style="width:10%;">Nama pemilik perusahaan</th>
                    <th style="width:10%;">Rangking</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $no = 1;
                  foreach ($daftar_rangking as $tampil) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $tampil->ID_PENDAFTAR; ?></td>
                  <td><?php echo $tampil->NAMA_PERUSAHAAN; ?></td>
                  <td><?php echo $tampil->NAMA_PEMILIK_PERUSAHAAN; ?></td>
                  <td><?php echo $tampil->V; ?></td>
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
    <strong>Copyright &copy; Dedi AW <a href="<?php echo base_url(); ?>assets/http://dedyadi87@gmail.com"></a>.</strong>
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view('plugins') ?>
</body>
</html>