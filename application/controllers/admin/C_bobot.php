<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bobot extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_bobot');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_bobot_ternormalisasi"] = $this->M_bobot->get_data();

		$this->load->view('admin/data_pendaftar/bobot_ternormalisasi/v_bobot_ternormalisasi', $data);
	}
	
	public function tambah_data_bobot_ternormalisasi()
	{
		$table = 'nilai_bobot_ternormalisasi';
        $id = "ID_NBT";
        $kode = "1";
        $karakter = "NBT-";

        $data['tampil_pendaftar'] = $this->M_bobot->m_pendaftar();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_pendaftar/bobot_ternormalisasi/v_tambah_bobot_ternormalisasi', $data);
	}
	
	public function proses_tambah_data_bobot_ternormalisasi()
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
			
		$this->M_bobot->input_data($data_post);

		/* Redirect */
		redirect('admin/C_bobot/index');
	}

	public function edit_data_normalisasi($ID_ND)
	{
		/* Setting where */
		$where["ID_ND"] = $ID_ND;

		$data['nilai_data'] = $this->M_bobot->get_by($ID_ND);

		$this->load->view('admin/data_pendaftar/nilai_data/v_form_edit_normalisasi', $data);
	}

	public function proses_edit_data_normalisasi()
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

		$this->M_bobot->update_data($where,$data_post);	

		redirect('admin/C_bobot/index');
	}

	public function hapus_data_normalisasi($ID_ND)
	{
		$this->M_bobot->delete_data($ID_ND);
		
		redirect('admin/C_bobot/index');
	}
}