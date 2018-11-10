<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>USER</title>
  <?php $this->load->view('plugins_atas') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('head') ?>
  <?php $this->load->view('side') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
              <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Edit Data pendaftar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= base_url('index.php/public/C_pendaftaran/proses_edit_data_pendaftar')?>" method="POST" class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">ID pendaftar</label>
                  <div class="col-sm-10">
                    <input name="id_pendaftar" type="text" readonly value="<?= $pendaftaran_ikm->ID_PENDAFTAR ?>" class="form-control" placeholder="Masukkan.......">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama perusahaan </label>

                  <div class="col-sm-10">
                    <input name="nama_perusahaan" type="text" value="<?= $pendaftaran_ikm->NAMA_PERUSAHAAN?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama pemilik perusahaan </label>

                  <div class="col-sm-10">
                    <input name="nama_pemilik_perusahaan" type="text" value="<?= $pendaftaran_ikm->NAMA_PEMILIK_PERUSAHAAN ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat Perusahaan</label>
                  <div class="col-sm-10">
                    <input name="alamat_perusahaan" type="text" value="<?= $pendaftaran_ikm->ALAMAT_PERUSAHAAN ?>" class="form-control" placeholder="Alamat kantor" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Telepon Perusahaan</label>
                  <div class="col-sm-10">
                    <input name="nomor_telepon_perusahaan" type="text" value="<?= $pendaftaran_ikm->NOMOR_TELEPON_PERUSAHAAN ?>" class="form-control" placeholder="Telepon fax kantor" required>
                  </div>
                </div>
                

                <div class="form-group" >
                  <label class="col-sm-2 control-label">investasi</label>
                  <div class="col-sm-10">
                      <select name="investasi" id="investasi" type="text" class="form-control" required>"
                      <?php foreach ($investasi as $investasi) {
                        echo '<option value="'.$investasi->ID_INVESTASI.'"';
                        if($investasi->ID_INVESTASI == $pendaftaran_ikm->NILAI_INVESTASI){
                          echo 'selected="selected"';
                        }
                        echo '>'.$investasi->JENJANG_INVESTASI.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group" id="sdm" >
                  <label class="col-sm-2 control-label">SDM</label>
                  <div class="col-sm-10">
                    <select name="sdm" id="sdm" type="text" class="form-control" required>"
                      <?php foreach ($sdm as $sdm) {
                        echo '<option value="'.$sdm->ID_SDM.'"';
                        if($sdm->ID_SDM == $pendaftaran_ikm->JUMLAH_TENAGA_KERJA){
                          echo 'selected="selected"';
                        }
                        echo '>'.$sdm->JENJANG_SDM.'</option>';
                      } ?>
                    </select>

                  </div>
                </div>

                <div class="form-group" id="legalitas_usaha" >
                  <label class="col-sm-2 control-label">Legalitas usaha</label>
                   <div class="col-sm-10">
                    <select name="jenis" id="jenis" type="text" class="form-control" required>"
                      <?php foreach ($jenis as $jenis) {
                        echo '<option value="'.$jenis->ID_LEGALITAS_USAHA.'"';
                        if($jenis->ID_LEGALITAS_USAHA == $pendaftaran_ikm->JENIZ_BADAN_USAHA){
                          echo 'selected="selected"';
                        }
                        echo '>'.$jenis->JENJANG_LEGALITAS_USAHA.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                 <div class="form-group" id="izin industri" >
                  <label class="col-sm-2 control-label">izin industri</label>
                  <div class="col-sm-10">
                    <select name="ijin" id="ijin" type="text" class="form-control" required>"
                      <?php foreach ($ijin as $ijin) {
                        echo '<option value="'.$ijin->ID_IZIN_INDUSTRI.'"';
                        if($ijin->ID_IZIN_INDUSTRI == $pendaftaran_ikm->IJIN_USAHA_INDUSTRI){
                          echo 'selected="selected"';
                        }
                        echo '>'.$ijin->JENJANG_IZIN_INDUSTRI.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group" id="izin industri" >
                  <label class="col-sm-2 control-label">sertifikat SNI</label>
                  <div class="col-sm-10">
                    <select name="sertifikat" id="sertifikat" type="text" class="form-control" required>"
                      <?php foreach ($sertifikat as $sertifikat) {
                        echo '<option value="'.$sertifikat->ID_SERTIFIKAT_SNI.'"';
                        if($sertifikat->ID_SERTIFIKAT_SNI == $pendaftaran_ikm->NOMOR_SNI){
                          echo 'selected="selected"';
                        }
                        echo '>'.$sertifikat->JENJANG_SERTIFIKAT_SNI.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                 
                <div class="form-group" id="partisipasi" >
                  <label class="col-sm-2 control-label">partisipasi</label>
                  <div class="col-sm-10">
                    <select name="jumlah" id="jumlah" type="text" class="form-control" required>"
                      <?php foreach ($jumlah as $jumlah) {
                        echo '<option value="'.$jumlah->ID_PARTISIPASI.'"';
                        if($jumlah->ID_PARTISIPASI == $pendaftaran_ikm->JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM){
                          echo 'selected="selected"';
                        }
                        echo '>'.$jumlah->JENJANG_PARTISIPASI.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group" id="ketersediaan mesin" >
                  <label class="col-sm-2 control-label">ketersediaan mesin</label>
                  <div class="col-sm-10">
                    <select name="ketersediaan" id="" type="text" class="form-control" required>"
                      <?php foreach ($ketersediaan as $ketersediaan) {
                        echo '<option value="'.$ketersediaan->ID_KETERSEDIAAN_MESIN.'"';
                        if($ketersediaan->ID_KETERSEDIAAN_MESIN == $pendaftaran_ikm->ADANYA_MESIN){
                          echo 'selected="selected"';
                        }
                        echo '>'.$ketersediaan->JENJANG_KETERSEDIAAN_MESIN.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group" id="kondisi mesin" >
                  <label class="col-sm-2 control-label">kondisi mesin</label>
                  <div class="col-sm-10">
                    <select name="kondisi" id="" type="text" class="form-control" required>"
                      <?php foreach ($kondisi as $kondisi) {
                        echo '<option value="'.$kondisi->ID_KONDISI_MESIN.'"';
                        if($kondisi->ID_KONDISI_MESIN == $pendaftaran_ikm->KEADAAN_MESIN){
                          echo 'selected="selected"';
                        }
                        echo '>'.$kondisi->JENJANG_KONDISI_MESIN.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group" id="kondisi mesin" >
                  <label class="col-sm-2 control-label">Tahun pembuatan mesin</label>
                  <div class="col-sm-10">
                    <select name="tahun" id="" type="text" class="form-control" required>"
                      <?php foreach ($tahun as $tahun) {
                        echo '<option value="'.$tahun->ID_TAHUN_PEMBUATAN_MESIN.'"';
                        if($tahun->ID_TAHUN_PEMBUATAN_MESIN == $pendaftaran_ikm->TAUN_PEMBUATAN_MESIN){
                          echo 'selected="selected"';
                        }
                        echo '>'.$tahun->JENJANG_TAHUN_PEMBUATAN_MESIN.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url(); ?>index.php/public/C_pendaftaran/tampil_view"><submit class="btn btn-default pull-left">Kembali</submit></a>
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
</body>
</html>