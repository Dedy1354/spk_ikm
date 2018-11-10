<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php $this->load->view('plugins_atas') ?>

  <style type="text/css">
    .left {text-align: left;}
    .right {text-align: right;}
    .center {text-align: center;}
    .justify {text-align: justify;}
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('header') ?>
  <?php $this->load->view('sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/admin/C_pendaftar">pendaftar</a></li>
      </ol>
    </section>
 

<section class='content'>
  <h2 class="page-header">Form Pendaftaran</h2>

      <div class="row">
        <div class="col-md-12" >
          
          <?php if($error!=null){?>
            <div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              <?php echo $this->session->flashdata('error'); 
              ?>

            </div>
            <?php } ?>


            <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php } ?>
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Input Data</a></li>
              <li><a href="#tab_3" data-toggle="tab">User Data</a></li>
              
            
            </ul>
            <form action="<?= base_url('index.php/admin/C_pendaftar/proses_tambah_data_pendaftar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="tab-content" >
              
              <div class="tab-pane active" id="tab_1">
                <div class="box-body" >

                <div class="form-group" >
                  <label class="col-sm-2 pull-left">ID pendaftar</label>

                  <div class="col-sm-4">
                    <input name="id_pendaftar" type="text" readonly value="<?=$kodeunik?>" class="form-control" placeholder="masukkan NIK">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">Nama perusahaan </label>
                  <div class="col-sm-4">
                    <input name="nama_perusahaan" type="text" class="form-control" placeholder="Nama perusahaan" value="<?php if($error!=null){
                        echo $NAMA_PERUSAHAAN;
                    }?>">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">Nama pemilik perusahaan </label>
                  <div class="col-sm-4">
                    <input name="nama_pemilik_perusahaan" type="text" class="form-control" placeholder="Nama pemilik perusahaan" value="<?php if($error!=null){
                        echo $NAMA_PEMILIK_PERUSAHAAN;
                    }?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">Alamat Perusahaan</label>
                  <div class="col-sm-4">
                    <input name="alamat_perusahaan" type="text" class="form-control" placeholder="Alamat kantor" value="<?php if($error!=null){
                        echo $ALAMAT_PERUSAHAAN;
                    }?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">Nomor Telepon Perusahaan</label>
                  <div class="col-sm-4">
                    <input name="nomor_telepon_perusahaan" type="text" class="form-control" placeholder="Telepon fax kantor" value="<?php if($error!=null){
                        echo $NOMOR_TELEPON_PERUSAHAAN;
                    }?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">Ijin usaha industri</label>
                  <div class="col-sm-4">
                    <?php foreach ($ijin as $ijin) {
                      if($error!=null && $ijin->ID_IZIN_INDUSTRI==$IJIN_USAHA_INDUSTRI){
                        echo '
                      <input name="ijin_usaha_industri" id="ijin" type="radio"  checked value="'.$ijin->ID_IZIN_INDUSTRI.'">'.$ijin->JENJANG_IZIN_INDUSTRI.'
                      ';
                      }else{
                      echo '
                      <input name="ijin_usaha_industri" id="ijin" type="radio"  value="'.$ijin->ID_IZIN_INDUSTRI.'">'.$ijin->JENJANG_IZIN_INDUSTRI.'
                      ';
                    }
                    } ?>
                  </div>
                </div>

              <div class="form-group">
                  <label class="col-sm-2 pull-left">Upload Ijin industri</label>
                  <div class="col-sm-4">
                  <input type="file" name="upload_ijin_usaha_industri" >
                </div>
                </div>

              <div class="form-group">
                  <label class="col-sm-2 pull-left">upload Akta pendirian terakhir</label>
                  <div class="col-sm-4">
                    <input type="file" name="akta_pendirian_terakhir" >
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 pull-left">Jenis badan usaha</label>
                    <div class="col-sm-4">
                    <select name="jeniz_badan_usaha" id="investasi" type="text" class="form-control">
                      <?php foreach ($jenis as $jenis) {
                        if($error!=null && $JENIZ_BADAN_USAHA==$jenis->ID_LEGALITAS_USAHA){
                          echo '<option selected value="'.$jenis->ID_LEGALITAS_USAHA.'">'.$jenis->JENJANG_LEGALITAS_USAHA.'</option>';
                        }else{
                          echo '<option value="'.$jenis->ID_LEGALITAS_USAHA.'">'.$jenis->JENJANG_LEGALITAS_USAHA.'</option>';
                        }
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">nilai investasi</label>
                  <div class="col-sm-4">
                    <select name="nilai_investasi" id="investasi" type="text" class="form-control" >
                      <?php foreach ($investasi as $investasi) {
                        if($error!=null && $NILAI_INVESTASI==$investasi->ID_INVESTASI){
                          echo '<option selected value="'.$investasi->ID_INVESTASI.'">'.$investasi->JENJANG_INVESTASI.'</option>';
                        }else{
                          echo '<option value="'.$investasi->ID_INVESTASI.'">'.$investasi->JENJANG_INVESTASI.'</option>';
                        }
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">Sertifikat SNI</label>
                  <div class="col-sm-4">
                    <?php foreach ($sertifikat as $sertifikat) {
                      if($error!=null && $sertifikat->ID_SERTIFIKAT_SNI==$NOMOR_SNI){
                      echo '
                      <input name="nomor_sni" type="radio"  checked value="'.$sertifikat->ID_SERTIFIKAT_SNI.'">'.$sertifikat->JENJANG_SERTIFIKAT_SNI.'
                      ';
                    } else{
                      echo '
                      <input name="nomor_sni" type="radio"  value="'.$sertifikat->ID_SERTIFIKAT_SNI.'">'.$sertifikat->JENJANG_SERTIFIKAT_SNI.'
                      ';
                    }
                  }?>
                    </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-2 pull-left">upload sertifikat SNI</label>
                  <div class="col-sm-4">
                    <input type="file" name="upload_sertifikat_sni">
                  </div>
                </div>


                 <div class="form-group">
                  <label class="col-sm-2 pull-left">Jenis Industri</label>
                  <div class="col-sm-4">
                    <input name="jenis_industri" <?php if($error!= null && $JENIS_INDUSTRI == "industri kecil"){echo "checked"; } ?> type="radio" value="industri kecil">industri kecil
                    <input name="jenis_industri" <?php if($error!= null && $JENIS_INDUSTRI == "industri menengah"){echo "checked"; } ?> type="radio" value="industri menengah">industri menengah
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">jumlah tanaga kerja</label>
                <div class="col-sm-4">
                    <select name="jumlah_tenaga_kerja" id="sdm" type="text" class="form-control" >
                      <?php foreach ($sdm as $sdm) {

                        if($error!=null && $JUMLAH_TENAGA_KERJA == $sdm->ID_SDM){
                          echo '<option selected value="'.$sdm->ID_SDM.'">'.$sdm->JENJANG_SDM.'</option>';
                        }else{
                          echo '<option value="'.$sdm->ID_SDM.'">'.$sdm->JENJANG_SDM.'</option>';
                        }
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">Ketersediaan Mesin</label>
                  <div class="col-sm-4">
                    <?php foreach ($Ketersediaan as $Ketersediaan) {
                      if($error!=null && $ADANYA_MESIN == $Ketersediaan->ID_KETERSEDIAAN_MESIN){
                        echo '
                        <input name="adanya_mesin" type="radio"  checked value="'.$Ketersediaan->ID_KETERSEDIAAN_MESIN.'">'.$Ketersediaan->JENJANG_KETERSEDIAAN_MESIN.'
                        ';
                      }else{
                        echo '
                        <input name="adanya_mesin" type="radio"  value="'.$Ketersediaan->ID_KETERSEDIAAN_MESIN.'">'.$Ketersediaan->JENJANG_KETERSEDIAAN_MESIN.'
                        ';
                      }
                    } ?>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">Kondisi Mesin</label>
                  <div class="col-sm-4">
                    <?php foreach ($kondisi as $kondisi) {
                      if($error!=null && $KEADAAN_MESIN == $kondisi->ID_KONDISI_MESIN){
                      echo '
                      <input name="keadaan_mesin"  type="radio" checked value="'.$kondisi->ID_KONDISI_MESIN.'">'.$kondisi->JENJANG_KONDISI_MESIN.'
                      ';
                    }else{
                      echo '
                      <input name="keadaan_mesin"  type="radio" value="'.$kondisi->ID_KONDISI_MESIN.'">'.$kondisi->JENJANG_KONDISI_MESIN.'
                      ';
                    } 
                  }?>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">tahun pembuatan mesin</label>
                   <div class="col-sm-4">
                    <select name="taun_pembuatan_mesin" id="tahun" type="text" class="form-control">
                      <?php foreach ($tahun as $tahun) {
                        if($error!=null && $TAUN_PEMBUATAN_MESIN==$tahun->ID_TAHUN_PEMBUATAN_MESIN){
                          echo '<option selected value="'.$tahun->ID_TAHUN_PEMBUATAN_MESIN.'">'.$tahun->JENJANG_TAHUN_PEMBUATAN_MESIN.'</option>';
                        }else{
                          echo '<option value="'.$tahun->ID_TAHUN_PEMBUATAN_MESIN.'">'.$tahun->JENJANG_TAHUN_PEMBUATAN_MESIN.'</option>';
                        }
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">jumlah ke ikut sertaan dalam program</label>
                  <div class="col-sm-4">
                    <select name="jumlah_keikutsertaan_dalam_program"  type="text" class="form-control">
                      <?php foreach ($jumlah as $jumlah) {
                        if($error!=null && $JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM==$jumlah->ID_PARTISIPASI){
                          echo '<option selected value="'.$jumlah->ID_PARTISIPASI.'">'.$jumlah->JENJANG_PARTISIPASI.'</option>';
                        } else{
                          echo '<option value="'.$jumlah->ID_PARTISIPASI.'">'.$jumlah->JENJANG_PARTISIPASI.'</option>';
                        }
                      }?>                      
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">surat pernyataan kebenaran dokumen</label>
                  <div class="col-sm-4">
                    <input type="file" name="upload_surat_pernyataan_kebenaran">
                </div>
                </div>
                </div>
              </div>


              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="box-body">
                  <div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">username</label>
                  <div class="col-sm-2">
                    <input type="text" name="user_name" readonly value="<?=$kodeunik?>" class="form-control" >
                </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 pull-left">password</label>
                  <div class="col-sm-2">
                    
                      <input type='password' name='password' class='form-control' value="<?php if($error!=null){ echo $PASSWORD ;}?>">
                </div>

              </div>

                  <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url(); ?>index.php/C_public"><submit class="btn btn-default pull-left">Kembali</submit></a>
                <button type="submit" class="btn btn-info pull-left">Simpan</button>
              </div>
            </div>
            </div>
             </form>
             
         </div>
         </div>
         </div>
        </div>       
        </div>
        </div>       
        
            <!-- /.tab-content -->

</section>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version 2017</b> 
    </div>
    <strong>Copyright &copy; Ainul Yaqin <a href="<?php echo base_url(); ?>assets/http://yaqinuciha906@gmail.com"></a>.</strong>
</footer>
  

<?php $this->load->view('plugins') ?>
</body>
</html>