<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pendaftar extends CI_Controller {

		//untuk pemanggilan model otomatis
	function __construct() {
		parent::__construct();

		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_user');
		$this->load->model('admin/M_kriteria');
		$this->load->model('admin/M_pendaftar');
		$this->load->model('admin/M_nilaidata');
		$this->load->model('admin/M_normalisasi');
		$this->load->model('admin/M_sertifikat');
		$this->load->model('admin/M_investasi');
		$this->load->model('admin/M_izin');
		$this->load->model('admin/M_legalitas');
		$this->load->model('admin/M_sdm');
		$this->load->model('admin/M_ketersediaan');
		$this->load->model('admin/M_mesin');
		$this->load->model('admin/M_pembuatan');
		$this->load->model('admin/M_partisipasi');
		$this->load->model('admin/M_matriknegatifpositif');
		$this->load->model('admin/M_bobot_ternormalisasi');
		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}
//tombol untuk mengaktifkan status ikm yang mau di rangking pada halaman c_pendaftar
	public function ganti_status_rangking($id_pendaftar,$status){
		if($status==0){
			$this->M_nilaidata->update_status($id_pendaftar,1);
		}else{
			$this->M_nilaidata->update_status($id_pendaftar,0);
		}
		redirect("admin/C_pendaftar");
	}
//fungsi tombol pada halaman data ikm untuk merangking menggunakan topsis
	public function topsis()
	{
		$this->M_normalisasi->delete_all();
		$this->M_bobot_ternormalisasi->delete_all();
		$this->M_matriknegatifpositif->delete_all();

		$this->NormalisasiData();
		$this->NormalisasiBobot();	
		$this->PerhitunganY();
		$this->PerhitunganD();
		redirect('admin/C_rangking');
	}
	public function index() {
		/* Ambil Data */
		$data ["daftar_pendaftar"] = $this->M_nilaidata->joinData();
		
		$this->load->view('admin/data_pendaftar/pendaftar/v_pendaftar', $data);
	}
	
// untuk nambah data pendaftar ikm	
	public function tambah_data_pendaftar()
	{
		$table = 'pendaftaran_ikm';
        $id = "ID_PENDAFTAR";
        $kode = "1";
        $karakter = "pdf-";
         
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
        $data['sertifikat'] = $this->M_sertifikat->get_data();
        $data['investasi'] = $this->M_investasi->get_data();
        $data['ijin'] = $this->M_izin->get_data();
        $data['jenis'] = $this->M_legalitas->get_data();
        $data['sdm'] = $this->M_sdm->get_data();
        $data['Ketersediaan'] = $this->M_ketersediaan->get_data();
        $data['kondisi'] = $this->M_mesin->get_data();
        $data['tahun'] = $this->M_pembuatan->get_data();
        $data['jumlah'] = $this->M_partisipasi->get_data();
        $data['error'] = null;
		$this->load->view('admin/data_pendaftar/pendaftar/v_tambah_pendaftar2', $data);
	}
// untuk fungsi mengupluod gambar
	private function get_extension($nama_field){
		$array = explode('.', $_FILES[$nama_field]['name']);
		$extension = end($array);
		return $extension;
	}

	private function atur_gambar($nama_folder,$nama_file,$nama_field){
		$config = array();

		$config['upload_path'] = 'assets/uploads/'.$nama_folder.'/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $nama_file;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload($nama_field)){
			$this->upload->data();
            //echo "<pre>";
            //print_r($result);
            //echo "</pre>";
		}else{
			$error = $this->upload->display_errors();
            // menampilkan pesan error
            //print_r($error);
		}

	}	
	public function proses_tambah_data_pendaftar()
	{
		$table = 'pendaftaran_ikm';
        $id = "ID_PENDAFTAR";
        $kode = "1";
        $karakter = "pdf-";
         
        $datae['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
        $datae['sertifikat'] = $this->M_sertifikat->get_data();
        $datae['investasi'] = $this->M_investasi->get_data();
        $datae['ijin'] = $this->M_izin->get_data();
        $datae['jenis'] = $this->M_legalitas->get_data();
        $datae['sdm'] = $this->M_sdm->get_data();
        $datae['Ketersediaan'] = $this->M_ketersediaan->get_data();
        $datae['kondisi'] = $this->M_mesin->get_data();
        $datae['tahun'] = $this->M_pembuatan->get_data();
        $datae['jumlah'] = $this->M_partisipasi->get_data();
        
        $field_file = ['upload_sertifikat_sni','upload_ijin_usaha_industri','akta_pendirian_terakhir','upload_surat_pernyataan_kebenaran'];
		$nama_folder = ['SNI','IJIN_USAHA','AKTA_PENDIRIAN','SURAT_PERNYATAAN'];

		for ($i=0; $i < sizeof($field_file); $i++) { 
			$this->atur_gambar($nama_folder[$i],$this->input->post('id_pendaftar'),$field_file[$i]);
		};
        /* Tangkap Post */
		
		$data_post['ID_PENDAFTAR']= $this->input->post('id_pendaftar');
		$data_post['NAMA_PERUSAHAAN']= $this->input->post('nama_perusahaan');
		$data_post['NAMA_PEMILIK_PERUSAHAAN']= $this->input->post('nama_pemilik_perusahaan');
		$data_post['ALAMAT_PERUSAHAAN']= $this->input->post('alamat_perusahaan');
		$data_post['NOMOR_TELEPON_PERUSAHAAN']= $this->input->post('nomor_telepon_perusahaan');
		$data_post['IJIN_USAHA_INDUSTRI']= $this->input->post('ijin_usaha_industri');
		$data_post['UPLOAD_IJIN_USAHA_INDUSTRI']=  $this->input->post('id_pendaftar').'.'.$this->get_extension($field_file[1]);
		$data_post['JENIZ_BADAN_USAHA']= $this->input->post('jeniz_badan_usaha');
		$data_post['AKTA_PENDIRIAN_TERAKHIR']= $this->input->post('id_pendaftar').'.'.$this->get_extension($field_file[2]);
		$data_post['NILAI_INVESTASI']= $this->input->post('nilai_investasi');
		$data_post['NOMOR_SNI']= $this->input->post('nomor_sni');
		$data_post['UPLOAD_SERTIFIKAT_SNI']= $this->input->post('id_pendaftar').'.'.$this->get_extension($field_file[0]);
		$data_post['JENIS_INDUSTRI']= $this->input->post('jenis_industri');
		$data_post['JUMLAH_TENAGA_KERJA']= $this->input->post('jumlah_tenaga_kerja');
		$data_post['ADANYA_MESIN']= $this->input->post('adanya_mesin');
		$data_post['KEADAAN_MESIN']= $this->input->post('keadaan_mesin');
		$data_post['TAUN_PEMBUATAN_MESIN']= $this->input->post('taun_pembuatan_mesin');
		$data_post['JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM']= $this->input->post('jumlah_keikutsertaan_dalam_program');
		$data_post['SURAT_PERNYATAAN_KEBENARAN_DOKUMEN']= $this->input->post('id_pendaftar').'.'.$this->get_extension($field_file[3]);
		$data['USER_NAME']= $this->input->post('user_name');
		$data['PASSWORD']= $this->input->post('password');
		$data['LEVEL']= 'User';

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_perusahaan', 'NAMA_PERUSAHAAN', 'required');
		$this->form_validation->set_rules('nama_pemilik_perusahaan', 'NAMA_PEMILIK_PERUSAHAAN', 'required');
		$this->form_validation->set_rules('alamat_perusahaan', 'ALAMAT ALAMAT_PERUSAHAAN', 'required');
		$this->form_validation->set_rules('nomor_telepon_perusahaan', 'NOMOR_TELEPON_PERUSAHAAN', 'required');
		$this->form_validation->set_rules('ijin_usaha_industri', 'IJIN_USAHA_INDUSTRI', 'required');
		$this->form_validation->set_rules('jeniz_badan_usaha', 'JENIZ_BADAN_USAHA', 'required');
		$this->form_validation->set_rules('nilai_investasi', 'NILAI_INVESTASI', 'required');
		$this->form_validation->set_rules('nomor_sni', 'NOMOR_SNI', 'required');
		$this->form_validation->set_rules('jenis_industri', 'JENIS_INDUSTRI', 'required');
		$this->form_validation->set_rules('jumlah_tenaga_kerja', 'JUMLAH_TENAGA_KERJA', 'required');
		$this->form_validation->set_rules('adanya_mesin', 'ADANYA_MESIN', 'required');
		$this->form_validation->set_rules('keadaan_mesin', 'KEADAAN_MESIN', 'required');
		$this->form_validation->set_rules('taun_pembuatan_mesin', 'TAUN_PEMBUATAN_MESIN', 'required');
		$this->form_validation->set_rules('jumlah_keikutsertaan_dalam_program', 'JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM', 'required');
		$this->form_validation->set_rules('user_name', 'USER_NAME', 'required');
		$this->form_validation->set_rules('password', 'PASSWORD', 'required');

		if ($this->form_validation->run() == FALSE)
        {
       		$this->session->set_flashdata('error', 'Data Ada yang Belum Diisi');
			 $data['error']  = validation_errors();
			//print_r($datae['er']);
			$a = array_merge($datae,$data_post,$data);
			$this->load->view('admin/data_pendaftar/pendaftar/v_tambah_pendaftar2',$a);
        }else{
			/* Masukkan Database */
			
			$this->M_pendaftar->input_data($data_post);
			$this->M_user->input_data($data);


			$table = 'nilai_data';
	        $id = "ID_ND";
	        $kode = "1";
	        $karakter = "nil-";
	         
	        //$data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
			// INSERRT tabel nilai_data
			$kriteria['ID_ND'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
			$kriteria['ID_PENDAFTAR'] = $data_post['ID_PENDAFTAR'];
			$kriteria['ND_INVESTASI'] = $this->M_investasi->get_by($data_post['NILAI_INVESTASI'])->BOBOT_INVESTASI;
			$kriteria['ND_SDM'] = $this->M_sdm->get_by($data_post['JUMLAH_TENAGA_KERJA'])->BOBOT_SDM;
			$kriteria['ND_LEGALITAS_USAHA'] = $this->M_legalitas->get_by($data_post['JENIZ_BADAN_USAHA'])->BOBOT_LEGALITAS_USAHA;
			$kriteria['ND_IZIN_INDUSTRI'] = $this->M_izin->get_by($data_post['IJIN_USAHA_INDUSTRI'])->BOBOT_IZIN_INDUSTRI;
			$kriteria['ND_SERTIFIKAT_SNI'] = $this->M_sertifikat->get_by($data_post['NOMOR_SNI'])->BOBOT_SERTIFIKAT_SNI;
			$kriteria['ND_PARTISIPASI'] = $this->M_partisipasi->get_by($data_post['JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM'])->BOBOT_PARTISIPASI;
			$kriteria['ND_KETERSEDIAAN_MESIN'] = $this->M_ketersediaan->get_by($data_post['ADANYA_MESIN'])->BOBOT_KETERSEDIAAN_MESIN;
			$kriteria['ND_KONDISI_MESIN'] = $this->M_mesin->get_by($data_post['KEADAAN_MESIN'])->BOBOT_KONDISI_MESIN;
			$kriteria['ND_TAHUN_PEMBUATAN_MESIN'] = $this->M_pembuatan->get_by($data_post['TAUN_PEMBUATAN_MESIN'])->BOBOT_TAHUN_PEMBUATAN_MESIN;
			$kriteria['STATUS'] = 0;

			$this->M_nilaidata->input_data($kriteria);

			/////////////////////////////////////////////////////////////////////////////////////////
			
			/* Redirect */

			$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
			redirect('admin/C_pendaftar/tambah_data_pendaftar');
		}
		
				
	}

	
// fungsi normalisasi data
	public function NormalisasiData(){
		$nilaiKuadrat = $this->HitungKuadratByKriteria();
		$nilai_data = $this->M_nilaidata->get_data_by_status(1);
		$i = 0;
		foreach ($nilai_data as $nilai_data) {
			$normalisasi['ID_NMT'] = '';
			$normalisasi['ID_PENDAFTAR'] = $nilai_data->ID_PENDAFTAR;
			$normalisasi['NMT_INVESTASI'] = $nilai_data->ND_INVESTASI/$nilaiKuadrat['investasi'];
			$normalisasi['NMT_SDM'] = $nilai_data->ND_SDM/$nilaiKuadrat['sdm'];
			$normalisasi['NMT_LEGALITAS_USAHA'] = $nilai_data->ND_LEGALITAS_USAHA/$nilaiKuadrat['legalitas_usaha'];
			$normalisasi['NMT_IZIN_INDUSTRI'] = $nilai_data->ND_IZIN_INDUSTRI/$nilaiKuadrat['izin_industri'];
			$normalisasi['NMT_SERTIFIKAT_SNI'] = $nilai_data->ND_SERTIFIKAT_SNI/$nilaiKuadrat['sertifikat'];
			$normalisasi['NMT_PARTISIPASI'] = $nilai_data->ND_PARTISIPASI/$nilaiKuadrat['partisipasi'];
			$normalisasi['NMT_KETERSEDIAAN_MESIN'] = $nilai_data->ND_KETERSEDIAAN_MESIN/$nilaiKuadrat['ketersediaan_mesin'];
			$normalisasi['NMT_KONDISI_MESIN'] = $nilai_data->ND_KONDISI_MESIN/$nilaiKuadrat['kondisi_mesin'];
			$normalisasi['NMT_TAHUN_PEMBUATAN_MESIN'] = $nilai_data->ND_TAHUN_PEMBUATAN_MESIN/$nilaiKuadrat['tahun_pembuatan_mesin'];
			
			$this->M_normalisasi->input_data($normalisasi);
		}
	}

// fungsi bobot ternormalisasi data	
	public function NormalisasiBobot(){

		$data = $this->M_normalisasi->get_data();
		
		foreach ($data as $nilai_data) {
			$normalisasi['ID_NBT'] = '';
			$normalisasi['ID_PENDAFTAR'] = $nilai_data->ID_PENDAFTAR;
			$normalisasi['NBT_INVESTASI'] = $nilai_data->NMT_INVESTASI*$this->M_kriteria->get_bobot_by_id('kri-0001')->BOBOT_KRITERIA;
			$normalisasi['NBT_SDM'] = $nilai_data->NMT_SDM*$this->M_kriteria->get_bobot_by_id('kri-0002')->BOBOT_KRITERIA;;
			$normalisasi['NBT_LEGALITAS_USAHA'] = $nilai_data->NMT_LEGALITAS_USAHA*$this->M_kriteria->get_bobot_by_id('kri-0003')->BOBOT_KRITERIA;;
			$normalisasi['NBT_IZIN_INDUSTRI'] = $nilai_data->NMT_IZIN_INDUSTRI*$this->M_kriteria->get_bobot_by_id('kri-0004')->BOBOT_KRITERIA;;
			$normalisasi['NBT_SERTIFIKAT_SNI'] = $nilai_data->NMT_SERTIFIKAT_SNI*$this->M_kriteria->get_bobot_by_id('kri-0005')->BOBOT_KRITERIA;;
			$normalisasi['NBT_PARTISIPASI'] = $nilai_data->NMT_PARTISIPASI*$this->M_kriteria->get_bobot_by_id('kri-0006')->BOBOT_KRITERIA;;
			$normalisasi['NBT_KETERSEDIAAN_MESIN'] = $nilai_data->NMT_KETERSEDIAAN_MESIN*$this->M_kriteria->get_bobot_by_id('kri-0007')->BOBOT_KRITERIA;;
			$normalisasi['NBT_KONDISI_MESIN'] = $nilai_data->NMT_KONDISI_MESIN*$this->M_kriteria->get_bobot_by_id('kri-0008')->BOBOT_KRITERIA;;
			$normalisasi['NBT_TAHUN_PEMBUATAN_MESIN'] = $nilai_data->NMT_TAHUN_PEMBUATAN_MESIN*$this->M_kriteria->get_bobot_by_id('kri-0009')->BOBOT_KRITERIA;;
			
			$this->M_bobot_ternormalisasi->input_data($normalisasi);
		}
	}

// fungsi perhitungan Y max dan Y min
	public function PerhitunganY(){
		$kriteria = $this->M_kriteria->get_data_id_kriteria(); 
		$namaKolom = ['NBT_INVESTASI','NBT_SDM','NBT_LEGALITAS_USAHA','NBT_IZIN_INDUSTRI','NBT_SERTIFIKAT_SNI','NBT_PARTISIPASI','NBT_KETERSEDIAAN_MESIN','NBT_KONDISI_MESIN','NBT_TAHUN_PEMBUATAN_MESIN'];
		$data = null;
		for ($i=0; $i < sizeof($namaKolom); $i++) {
			$data = [
				'ID' => '',
				'ID_KRITERIA' => $kriteria[$i]->ID_KRITERIA,
				'TIPE_KRITERIA' => $kriteria[$i]->TIPE_KRITERIA,
				  
			];

			if($kriteria[$i]->TIPE_KRITERIA=='benefit'){
				$data['Y_MIN'] = 	$this->M_bobot_ternormalisasi->get_min_by_kolom($namaKolom[$i])->$namaKolom[$i];
				$data['Y_MAX'] = 	$this->M_bobot_ternormalisasi->get_max_by_kolom($namaKolom[$i])->$namaKolom[$i];
			}else if($kriteria[$i]->TIPE_KRITERIA=='cost'){
				$data['Y_MAX'] = 	$this->M_bobot_ternormalisasi->get_min_by_kolom($namaKolom[$i])->$namaKolom[$i];
				$data['Y_MIN'] = 	$this->M_bobot_ternormalisasi->get_max_by_kolom($namaKolom[$i])->$namaKolom[$i];
			}

			$this->M_matriknegatifpositif->input_data($data);

		}
	}

// fungsi perhitungan D max dan D min
	public function PerhitunganD()
	{
		
		$data = $this->M_bobot_ternormalisasi->get_data();
		foreach ($data as $data) {
			$dPlus = 0;
			$dMin = 0;
			$v = 0;
			$dPlus = pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0001')->Y_MAX-$data->NBT_INVESTASI), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0002')->Y_MAX-$data->NBT_SDM), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0003')->Y_MAX-$data->NBT_LEGALITAS_USAHA), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0004')->Y_MAX-$data->NBT_IZIN_INDUSTRI), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0005')->Y_MAX-$data->NBT_SERTIFIKAT_SNI), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0006')->Y_MAX-$data->NBT_PARTISIPASI), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0007')->Y_MAX-$data->NBT_KETERSEDIAAN_MESIN), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0008')->Y_MAX-$data->NBT_KONDISI_MESIN), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0009')->Y_MAX-$data->NBT_TAHUN_PEMBUATAN_MESIN), 2)
			;
			$dMin =  pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0001')->Y_MIN-$data->NBT_INVESTASI), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0002')->Y_MIN-$data->NBT_SDM), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0003')->Y_MIN-$data->NBT_LEGALITAS_USAHA), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0004')->Y_MIN-$data->NBT_IZIN_INDUSTRI), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0005')->Y_MIN-$data->NBT_SERTIFIKAT_SNI), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0006')->Y_MIN-$data->NBT_PARTISIPASI), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0007')->Y_MIN-$data->NBT_KETERSEDIAAN_MESIN), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0008')->Y_MIN-$data->NBT_KONDISI_MESIN), 2)+
					 pow(($this->M_matriknegatifpositif->get_data_by_id_kriteria('kri-0009')->Y_MIN-$data->NBT_TAHUN_PEMBUATAN_MESIN), 2)
			;
			$dPlus = sqrt($dPlus);
			$dMin = sqrt($dMin);
			$v = $dMin / ($dMin+$dPlus);
			$this->M_bobot_ternormalisasi->update_data_D_V($data->ID_PENDAFTAR,$dPlus,$dMin,$v);
		}
		
	}


// fungsi untuk menghitung kuadrat
	public function HitungKuadratByKriteria(){
		//$nilai_data = $this->M_nilaidata->get_data();
		$nilai_data = $this->M_nilaidata->get_data_by_status(1);
		$data = null;
		foreach ($nilai_data as $nilai_data) {
			$data = [
				'investasi' => $data['investasi'] + $nilai_data->ND_INVESTASI * $nilai_data->ND_INVESTASI,
				'sdm' => $data['sdm'] + $nilai_data->ND_SDM * $nilai_data->ND_SDM,
				'legalitas_usaha' => $data['legalitas_usaha'] + $nilai_data->ND_LEGALITAS_USAHA * $nilai_data->ND_LEGALITAS_USAHA,
				'izin_industri' => $data['izin_industri'] + $nilai_data->ND_IZIN_INDUSTRI * $nilai_data->ND_IZIN_INDUSTRI,
				'sertifikat' => $data['sertifikat'] + $nilai_data->ND_SERTIFIKAT_SNI * $nilai_data->ND_SERTIFIKAT_SNI,
				'partisipasi' => $data['partisipasi'] + $nilai_data->ND_PARTISIPASI * $nilai_data->ND_PARTISIPASI,
				'ketersediaan_mesin' => $data['ketersediaan_mesin'] + $nilai_data->ND_KETERSEDIAAN_MESIN * $nilai_data->ND_KETERSEDIAAN_MESIN,
				'kondisi_mesin' => $data['kondisi_mesin'] + $nilai_data->ND_KONDISI_MESIN * $nilai_data->ND_KONDISI_MESIN,
				'tahun_pembuatan_mesin' => $data['tahun_pembuatan_mesin'] + $nilai_data->ND_TAHUN_PEMBUATAN_MESIN * $nilai_data->ND_TAHUN_PEMBUATAN_MESIN,  
			//print_r($data)
			];
		}

		foreach ($data as $data1) {
			$data2 = [
				'investasi' => sqrt($data['investasi']),
				'sdm' => sqrt($data['sdm']) ,
				'legalitas_usaha' => sqrt($data['legalitas_usaha']),
				'izin_industri' => sqrt($data['izin_industri']),
				'sertifikat' => sqrt($data['sertifikat']),
				'partisipasi' => sqrt($data['partisipasi']),
				'ketersediaan_mesin' => sqrt($data['ketersediaan_mesin']),
				'kondisi_mesin' => sqrt($data['kondisi_mesin']),
				'tahun_pembuatan_mesin' => sqrt($data['tahun_pembuatan_mesin']),  
			
			];
		}
		//print_r($data);
		
		return $data2;

	}
// fungsi edit data pendaftar
	public function edit_data_pendaftar($ID_PENDAFTAR)
	{
		/* Setting where */
		$where["ID_PENDAFTAR"] = $ID_PENDAFTAR;

		$data['pendaftaran_ikm'] = $this->M_pendaftar->get_by($ID_PENDAFTAR);
		$data['sertifikat'] = $this->M_sertifikat->get_data();
        $data['investasi'] = $this->M_investasi->get_data();
        $data['ijin'] = $this->M_izin->get_data();
        $data['jenis'] = $this->M_legalitas->get_data();
        $data['sdm'] = $this->M_sdm->get_data();
        $data['ketersediaan'] = $this->M_ketersediaan->get_data();
        $data['kondisi'] = $this->M_mesin->get_data();
        $data['tahun'] = $this->M_pembuatan->get_data();
        $data['jumlah'] = $this->M_partisipasi->get_data();


		$this->load->view('admin/data_pendaftar/pendaftar/v_form_edit_pendaftar', $data);
	}

	public function proses_edit_data_pendaftar()
	{	
		$data_post['NAMA_PERUSAHAAN']= $this->input->post('nama_perusahaan');
		$data_post['NAMA_PEMILIK_PERUSAHAAN']= $this->input->post('nama_pemilik_perusahaan');
		$data_post['ALAMAT_PERUSAHAAN']= $this->input->post('alamat_perusahaan');
		$data_post['NOMOR_TELEPON_PERUSAHAAN']= $this->input->post('nomor_telepon_perusahaan');
		$data_post['IJIN_USAHA_INDUSTRI']= $this->input->post('ijin');
		$data_post['JENIZ_BADAN_USAHA']= $this->input->post('jenis');
		$data_post['AKTA_PENDIRIAN_TERAKHIR']= $this->input->post('akta_pendirian_terakhir');
		$data_post['NILAI_INVESTASI']= $this->input->post('investasi');
		$data_post['NOMOR_SNI']= $this->input->post('sertifikat');
		$data_post['UPLOAD_SERTIFIKAT_SNI']= $this->input->post('sertifikat');
		$data_post['JENIS_INDUSTRI']= $this->input->post('jenis_industri');
		$data_post['JUMLAH_TENAGA_KERJA']= $this->input->post('sdm');
		$data_post['ADANYA_MESIN']= $this->input->post('ketersediaan');
		$data_post['KEADAAN_MESIN']= $this->input->post('kondisi');
		$data_post['TAUN_PEMBUATAN_MESIN']= $this->input->post('tahun');
		$data_post['JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM']= $this->input->post('jumlah');
		$data_post['SURAT_PERNYATAAN_KEBENARAN_DOKUMEN']= $this->input->post('surat_pernyataan_kebenaran_dokumen');

		$where['ID_PENDAFTAR'] = $this->input->post('id_pendaftar');

		$this->M_pendaftar->update_data($where,$data_post);

		$kriteria['ND_INVESTASI'] = $this->M_investasi->get_by($data_post['NILAI_INVESTASI'])->BOBOT_INVESTASI;
		$kriteria['ND_SDM'] = $this->M_sdm->get_by($data_post['JUMLAH_TENAGA_KERJA'])->BOBOT_SDM;
		$kriteria['ND_LEGALITAS_USAHA'] = $this->M_legalitas->get_by($data_post['JENIZ_BADAN_USAHA'])->BOBOT_LEGALITAS_USAHA;
		$kriteria['ND_IZIN_INDUSTRI'] = $this->M_izin->get_by($data_post['IJIN_USAHA_INDUSTRI'])->BOBOT_IZIN_INDUSTRI;
		$kriteria['ND_SERTIFIKAT_SNI'] = $this->M_sertifikat->get_by($data_post['NOMOR_SNI'])->BOBOT_SERTIFIKAT_SNI;
		$kriteria['ND_PARTISIPASI'] = $this->M_partisipasi->get_by($data_post['JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM'])->BOBOT_PARTISIPASI;
		$kriteria['ND_KETERSEDIAAN_MESIN'] = $this->M_ketersediaan->get_by($data_post['ADANYA_MESIN'])->BOBOT_KETERSEDIAAN_MESIN;
		$kriteria['ND_KONDISI_MESIN'] = $this->M_mesin->get_by($data_post['KEADAAN_MESIN'])->BOBOT_KONDISI_MESIN;
		$kriteria['ND_TAHUN_PEMBUATAN_MESIN'] = $this->M_pembuatan->get_by($data_post['TAUN_PEMBUATAN_MESIN'])->BOBOT_TAHUN_PEMBUATAN_MESIN;

		$this->M_nilaidata->update_data($where['ID_PENDAFTAR'],$kriteria);


		redirect('admin/C_pendaftar/index');
	}


// fungsi detail data pendaftar
		public function detail_data_pendaftar($ID_PENDAFTAR)
	{
		/* Setting where */
		$where["ID_PENDAFTAR"] = $ID_PENDAFTAR;

		$data['pendaftaran_ikm'] = $this->M_pendaftar->get_by($ID_PENDAFTAR);
		$data['NILAI_INVESTASI'] = $this->M_investasi->get_by($data['pendaftaran_ikm']->NILAI_INVESTASI)->JENJANG_INVESTASI;
		$data['JUMLAH_TENAGA_KERJA'] = $this->M_sdm->get_by($data['pendaftaran_ikm']->JUMLAH_TENAGA_KERJA)->JENJANG_SDM;
		$data['JENIZ_BADAN_USAHA'] = $this->M_legalitas->get_by($data['pendaftaran_ikm']->JENIZ_BADAN_USAHA)->JENJANG_LEGALITAS_USAHA;
		$data['IJIN_USAHA_INDUSTRI'] = $this->M_izin->get_by($data['pendaftaran_ikm']->IJIN_USAHA_INDUSTRI)->JENJANG_IZIN_INDUSTRI;
		$data['NOMOR_SNI'] = $this->M_sertifikat->get_by($data['pendaftaran_ikm']->NOMOR_SNI)->JENJANG_SERTIFIKAT_SNI;
		$data['JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM'] = $this->M_partisipasi->get_by($data['pendaftaran_ikm']->JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM)->JENJANG_PARTISIPASI;
		$data['ADANYA_MESIN'] = $this->M_ketersediaan->get_by($data['pendaftaran_ikm']->ADANYA_MESIN)->JENJANG_KETERSEDIAAN_MESIN;
		$data['KEADAAN_MESIN'] = $this->M_mesin->get_by($data['pendaftaran_ikm']->KEADAAN_MESIN)->JENJANG_KONDISI_MESIN;
		$data['TAUN_PEMBUATAN_MESIN'] = $this->M_pembuatan->get_by($data['pendaftaran_ikm']->TAUN_PEMBUATAN_MESIN)->JENJANG_TAHUN_PEMBUATAN_MESIN;
		

		$this->load->view('admin/data_pendaftar/pendaftar/v_form_detail', $data);
	}

// fungsi hapus data pendaftar
	public function hapus_data_pendaftar($ID_PENDAFTAR)
	{
		$this->M_pendaftar->delete_data($ID_PENDAFTAR);
		$this->M_user->delete_data($ID_PENDAFTAR);
		
		redirect('admin/C_pendaftar/index');
	}
}