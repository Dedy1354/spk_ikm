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
              <h3 class="box-title">Form Detail Data pendaftar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= base_url('')?>" method="POST" class="form-horizontal">
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
                    <input name="nama_perusahaan" type="text" readonly value="<?= $pendaftaran_ikm->NAMA_PERUSAHAAN?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama pemilik perusahaan </label>

                  <div class="col-sm-10">
                    <input name="nama_pemilik_perusahaan" type="text" readonly value="<?= $pendaftaran_ikm->NAMA_PEMILIK_PERUSAHAAN ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat Perusahaan</label>
                  <div class="col-sm-10">
                    <input name="alamat_perusahaan" type="text" readonly value="<?= $pendaftaran_ikm->ALAMAT_PERUSAHAAN ?>" class="form-control" placeholder="Alamat kantor" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Telepon Perusahaan</label>
                  <div class="col-sm-10">
                    <input name="nomor_telepon_perusahaan" type="text" readonly value="<?= $pendaftaran_ikm->NOMOR_TELEPON_PERUSAHAAN ?>" class="form-control" placeholder="Telepon fax kantor" required>
                  </div>
                </div>
                

                <div class="form-group" >
                  <label class="col-sm-2 control-label">investasi</label>
                  <div class="col-sm-10">
                    <input name="nilai_investasi" type="text" readonly value="<?= $NILAI_INVESTASI ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>

                <div class="form-group" id="sdm" >
                  <label class="col-sm-2 control-label">SDM</label>
                  <div class="col-sm-10">
                    <input name="jumlah_tenaga_kerja" type="text" readonly value="<?= $JUMLAH_TENAGA_KERJA ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>

                <div class="form-group" id="legalitas_usaha" >
                  <label class="col-sm-2 control-label">Legalitas usaha</label>
                   <div class="col-sm-10">
                    <input name="jeniz_badan_usaha" type="text" readonly value="<?= $JENIZ_BADAN_USAHA ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>

                 <div class="form-group" id="izin industri" >
                  <label class="col-sm-2 control-label">izin industri</label>
                  <div class="col-sm-10">
                    <input name="ijin_usaha_industri" type="text" readonly value="<?= $IJIN_USAHA_INDUSTRI ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>

                <div class="form-group" id="izin industri" >
                  <label class="col-sm-2 control-label">sertifikat SNI</label>
                  <div class="col-sm-10">
                    <input name="nomor_sni" type="text" readonly value="<?= $NOMOR_SNI ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>
                <div class="form-group" id="partisipasi" >
                  <label class="col-sm-2 control-label">partisipasi</label>
                  <div class="col-sm-10">
                    <input name="jumlah_keikutsertaan_dalam_program" type="text" readonly value="<?= $JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>
                <div class="form-group" id="ketersediaan mesin" >
                  <label class="col-sm-2 control-label">ketersediaan mesin</label>
                  <div class="col-sm-10">
                    <input name="adanya_mesin" type="text" readonly value="<?= $ADANYA_MESIN ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>
                <div class="form-group" id="kondisi mesin" >
                  <label class="col-sm-2 control-label">kondisi mesin</label>
                  <div class="col-sm-10">
                    <input name="keadaan_mesin" type="text" readonly value="<?= $KEADAAN_MESIN ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>
                <div class="form-group" id="kondisi mesin" >
                  <label class="col-sm-2 control-label">Tahun pembuatan mesin</label>
                  <div class="col-sm-10">
                    <input name="taun_pembuatan_mesin" type="text" readonly value="<?= $TAUN_PEMBUATAN_MESIN ?>" class="form-control" placeholder="Masukkan .........." required>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url(); ?>index.php/public/C_pendaftaran/tampil_view"><submit class="btn btn-default pull-left">Kembali</submit></a>
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