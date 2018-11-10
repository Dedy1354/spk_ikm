<?php 
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=RekapDataRangking.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

	<style type="text/css">
    .tengah {
		text-align: center;
	}
	.th {
		font: bold;
	}
	td{
		mso-number-format:"\@";
	}
	</style>

	<center><h2>Rekap Data Hasil Penilaian Koperasi Bangkalan</h2></center>

	<table border='1'>
	<h3>
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
                  <td><?php echo $tampil->rangking; ?></td>
                </tr>
                <?php } ?>
        </tbody>
	</h3>
	</table>