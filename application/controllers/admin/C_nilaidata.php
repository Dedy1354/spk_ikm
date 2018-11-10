<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_nilaidata extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_nilaidata');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_nilai_data"] = $this->M_nilaidata->get_data();

		$this->load->view('admin/data_pendaftar/nilai_data/v_nilai_data', $data);
	}
	
	public function tambah_data_nilaidata()
	{
		$table = 'nilai_data';
        $id = "ID_ND";
        $kode = "1";
        $karakter = "ND-";

        $data['tampil_pendaftar'] = $this->M_nilaidata->m_pendaftar();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_pendaftar/nilai_data/v_tambah_nilaidata', $data);
	}

	public function nilai_investasi($id_pendaftar){
		$data= $this->M_nilaidata->ambil_nilai_investasi($id_pendaftar);
		if($id_pendaftar=='0'){
			echo "0";
		}else{
			echo $data->NILAI_INVESTASI;
		}
	}
	public function nilai_sdm($id_pendaftar){
		$data= $this->M_nilaidata->ambil_nilai_sdm($id_pendaftar);
		if($id_pendaftar=='0'){
			echo "0";
		}else{
			echo $data->JUMLAH_TENAGA_KERJA;
		}
	}
	public function nilai_badanusaha($id_pendaftar){
		$data= $this->M_nilaidata->ambil_nilai_badanusaha($id_pendaftar);
		if($id_pendaftar=='0'){
			echo "0";
		}else{
			echo $data->JENIZ_BADAN_USAHA;
		}
	}
	public function nilai_izin($id_pendaftar){
		$data= $this->M_nilaidata->ambil_nilai_izin($id_pendaftar);
		if($id_pendaftar=='0'){
			echo "0";
		}else{
			echo $data->IJIN_USAHA_INDUSTRI;
		}
	}
	public function nilai_sertifikat($id_pendaftar){
		$data= $this->M_nilaidata->ambil_nilai_sertifikat($id_pendaftar);
		if($id_pendaftar=='0'){
			echo "0";
		}else{
			echo $data->NOMOR_SNI;
		}
	}
	public function nilai_partisipasi($id_pendaftar){
		$data= $this->M_nilaidata->ambil_nilai_partisipasi($id_pendaftar);
		if($id_pendaftar=='0'){
			echo "0";
		}else{
			echo $data->JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM;
		}
	}
	public function nilai_ketersediaan($id_pendaftar){
		$data= $this->M_nilaidata->ambil_nilai_ketersediaan($id_pendaftar);
		if($id_pendaftar=='0'){
			echo "0";
		}else{
			echo $data->ADANYA_MESIN;
		}
	}
	public function nilai_kondisi($id_pendaftar){
		$data= $this->M_nilaidata->ambil_nilai_kondisi($id_pendaftar);
		if($id_pendaftar=='0'){
			echo "0";
		}else{
			echo $data->KEADAAN_MESIN;
		}
	}
	public function nilai_pembuatan($id_pendaftar){
		$data= $this->M_nilaidata->ambil_nilai_pembuatan($id_pendaftar);
		if($id_pendaftar=='0'){
			echo "0";
		}else{
			echo $data->TAUN_PEMBUATAN_MESIN;
		}
	}

	public function proses_tambah_data_nilaidata()
	{
		$data_post['ID_ND']= $this->input->post('id_nd');
		$data_post['ID_PENDAFTAR']= $this->input->post('id_pendaftar');
		$data_post['ND_INVESTASI']= $this->input->post('nd_investasi');
		$data_post['ND_SDM']= $this->input->post('nd_sdm');
		$data_post['ID_LEGALITAS_USHA']= $this->input->post('nd_legalitas_usha');
		$data_post['ID_IZIN_INDUSTRI']= $this->input->post('nd_izin_industri');
		$data_post['ND_SERTIFIKAT_SNI']= $this->input->post('nd_sertifikat_sni');
		$data_post['ND_PARTISIPASI']= $this->input->post('nd_partisipasi');
		$data_post['ND_KETERSEDIAAN_MESIN']= $this->input->post('nd_ketersediaan_mesin');
		$data_post['ND_KONDISI_MESIN']= $this->input->post('nd_kondisi_mesin');
		$data_post['ND_TAHUN_PEMBUATAN_MESIN']= $this->input->post('nd_tahun_pembuatan_mesin');
		$data_post['ND_AKAR_HASIL_PANGKAT_PERKRITERIA']= $this->input->post('nd_akar_hasil_pangkat_perkriteria');
			
		$this->M_nilaidata->input_data($data_post);

		/* Redirect */
		redirect('admin/C_nilaidata/index');
	}

	public function edit_data_nilaidata($ID_ND)
	{
		/* Setting where */
		$where["ID_ND"] = $ID_ND;

		$data['nilai_data'] = $this->M_nilaidata->get_by($ID_ND);

		$this->load->view('admin/data_pendaftar/nilai_data/v_form_edit_nilaidata', $data);
	}

	public function proses_edit_data_nilaidata()
	{
		$data_post['ID_PENDAFTAR']= $this->input->post('id_pendaftar');
		$data_post['ND_INVESTASI']= $this->input->post('nd_investasi');
		$data_post['ND_SDM']= $this->input->post('nd_sdm');
		$data_post['ID_LEGALITAS_USHA']= $this->input->post('nd_legalitas_usha');
		$data_post['ID_IZIN_INDUSTRI']= $this->input->post('nd_izin_industri');
		$data_post['ND_SERTIFIKAT_SNI']= $this->input->post('nd_sertifikat_sni');
		$data_post['ND_PARTISIPASI']= $this->input->post('nd_partisipasi');
		$data_post['ND_KETERSEDIAAN_MESIN']= $this->input->post('nd_ketersediaan_mesin');
		$data_post['ND_KONDISI_MESIN']= $this->input->post('nd_kondisi_mesin');
		$data_post['ND_TAHUN_PEMBUATAN_MESIN']= $this->input->post('nd_tahun_pembuatan_mesin');
		$data_post['ND_AKAR_HASIL_PANGKAT_PERKRITERIA']= $this->input->post('nd_akar_hasil_pangkat_perkriteria');
		
		$where['ID_ND'] = $this->input->post('id_nd');

		$this->M_nilaidata->update_data($where,$data_post);	

		redirect('admin/C_nilaidata/index');
	}

	public function hapus_data_nilaidata($ID_ND)
	{
		$this->M_nilaidata->delete_data($ID_ND);
		
		redirect('admin/C_nilaidata/index');
	}
}