

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>USER</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php $this->load->view('plugins_atas') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <?php $this->load->view('head') ?>
  <?php $this->load->view('side') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/Home_user"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/publi/C_pendaftaran">pendaftar</a></li>
      </ol>
    </section>
    <section class='content'>

    <section class='content'>
        <h2 class="page-header">Form Pendaftran</h2>

      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
              
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <form action="<?= base_url('index.php/public/C_pendaftaran/proses_tambah_data_pendaftar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="tab-content">
              
              <div class="tab-pane active" id="tab_1">
                <div class="box-body">

                <div class="form-group" >
                  <label class="col-sm-2 control-label ">ID pendaftar</label>
                  <div class="col-sm-10">
                    <input name="id_pendaftar" type="text" readonly value="<?=$kodeunik?>" class="form-control" placeholder="masukkan NIK">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama perusahaan </label>
                  <div class="col-sm-10">
                    <input name="nama_perusahaan" type="text" class="form-control" placeholder="Nama perusahaan" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama pemilik perusahaan </label>
                  <div class="col-sm-10">
                    <input name="nama_pemilik_perusahaan" type="text" class="form-control" placeholder="Nama pemilik perusahaan" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat Perusahaan</label>
                  <div class="col-sm-10">
                    <input name="alamat_perusahaan" type="text" class="form-control" placeholder="Alamat kantor" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Telepon Perusahaan</label>
                  <div class="col-sm-10">
                    <input name="nomor_telepon_perusahaan" type="text" class="form-control" placeholder="Telepon fax kantor" >
                  </div>
                </div>
              </div>
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="box-body">
                
                <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ijin usaha industri</label>
                  <div class="col-sm-10">
                    <?php foreach ($ijin as $ijin) {
                      echo '
                      <input name="ijin_usaha_industri" type="radio"  value="'.$ijin->BOBOT_IZIN_INDUSTRI.'">'.$ijin->JENJANG_IZIN_INDUSTRI.'
                      ';
                    } ?>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Upload Ijin industri</label>
                  <div class="col-sm-10">
                  <input type="file" name="upload_ijin_usaha_industri" >
                </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis badan usaha</label>
                    <div class="col-sm-10">
                    <select name="jeniz_badan_usaha" id="investasi" type="text" class="form-control" >
                      <?php foreach ($jenis as $jenis) {
                        echo '<option value="'.$jenis->BOBOT_LEGALITAS_USAHA.'">'.$jenis->JENJANG_LEGALITAS_USAHA.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

              <div class="form-group">
                  <label class="col-sm-2 control-label">upload Akta pendirian terakhir</label>
                  <div class="col-sm-10">
                    <input type="file" name="akta_pendirian_terakhir" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">nilai investasi</label>
                  <div class="col-sm-10">
                    <select name="nilai_investasi" id="investasi" type="text" class="form-control" >
                      <?php foreach ($investasi as $investasi) {
                        echo '<option value="'.$investasi->BOBOT_INVESTASI.'">'.$investasi->JENJANG_INVESTASI.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Sertifikat SNI</label>
                  <div class="col-sm-10">
                    <?php foreach ($sertifikat as $sertifikat) {
                      echo '
                      <input name="nomor_sni" type="radio"  value="'.$sertifikat->BOBOT_SERTIFIKAT_SNI.'">'.$sertifikat->JENJANG_SERTIFIKAT_SNI.'
                      ';
                    } ?>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">upload sertifikat SNI</label>
                  <div class="col-sm-10">
                    <input type="file" name="upload_sertifikat_sni" >
                  </div>
                </div>
              </div>
            </div>
          </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="box-body">
  
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Industri</label>
                  <div class="col-sm-10">
                    <input name="jenis_industri"  type="radio" value="industri kecil">industri kecil
                    <input name="jenis_industri"  type="radio" value="industri menengah">industri menengah
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">jumlah tanaga kerja</label>
                <div class="col-sm-10">
                    <select name="jumlah_tenaga_kerja" id="sdm" type="text" class="form-control" >
                      <?php foreach ($sdm as $sdm) {
                        echo '<option value="'.$sdm->BOBOT_SDM.'">'.$sdm->JENJANG_SDM.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Ketersediaan Mesin</label>
                  <div class="col-sm-10">
                    <?php foreach ($Ketersediaan as $Ketersediaan) {
                      echo '
                      <input name="adanya_mesin" type="radio"  value="'.$Ketersediaan->BOBOT_KETERSEDIAAN_MESIN.'">'.$Ketersediaan->JENJANG_KETERSEDIAAN_MESIN.'
                      ';
                    } ?>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kondisi Mesin</label>
                  <div class="col-sm-10">
                    <?php foreach ($kondisi as $kondisi) {
                      echo '
                      <input name="keadaan_mesin"  type="radio" value="'.$kondisi->BOBOT_KONDISI_MESIN.'">'.$kondisi->JENJANG_KONDISI_MESIN.'
                      ';
                    } ?>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">tahun pembuatan mesin</label>
                   <div class="col-sm-10">
                    <select name="taun_pembuatan_mesin" id="tahun" type="text" class="form-control" required>
                      <?php foreach ($tahun as $tahun) {
                        echo '<option value="'.$tahun->BOBOT_TAHUN_PEMBUATAN_MESIN.'">'.$tahun->JENJANG_TAHUN_PEMBUATAN_MESIN.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">jumlah ke ikut sertaan dalam program</label>
                  <div class="col-sm-10">
                    <select name="jumlah_keikutsertaan_dalam_program"  type="text" class="form-control" required>
                      <?php foreach ($jumlah as $jumlah) {
                        echo '<option value="'.$jumlah->BOBOT_PARTISIPASI.'">'.$jumlah->JENJANG_PARTISIPASI.'</option>';
                      } ?>                      
                    </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">surat pernyataan kebenaran dokumen</label>
                  <div class="col-sm-10">
                    <input type="file" name="upload_surat_pernyataan_kebenaran" >
                </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">username</label>
                  <div class="col-sm-10">
                    <input type="text" name="user_name" readonly value="<?=$kodeunik?>" class="form-control" >
                </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">password</label>
                  <div class="col-sm-10">
                    <input type="text" name="password" class="form-control" >
                </div>
                </div>

              </div>

                  <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url(); ?>index.php/public/home_user"><submit class="btn btn-default pull-left">Kembali</submit></a>
                <button type="submit" class="btn btn-info pull-left">Simpan</button>
              </div>

             </form>
              <!-- /.tab-pane -->
            </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
      </div>
          
    </div>
        <!-- /.col -->
  </section>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version 2017</b> 
    </div>
    <strong>Copyright &copy; Ainul Yaqin <a href="<?php echo base_url(); ?>assets/http://yaqinuciha906@gmail.com"></a>.</strong>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version 2017</b> 
    </div>
    <strong>Copyright &copy; Ainul Yaqin <a href="<?php echo base_url(); ?>assets/http://yaqinuciha906@gmail.com"></a>.</strong>
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


<? ?>
</body>
</html>