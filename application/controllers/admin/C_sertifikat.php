<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_sertifikat extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_sertifikat');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_sertifikat"] = $this->M_sertifikat->get_data();

		$this->load->view('admin/data_master/sertifikat/v_sertifikat', $data);
	}
	
	public function tambah_data_sertifikat()
	{
		$table = 'sertifikat_sni';
        $id = "ID_SERTIFIKAT_SNI";
        $kode = "1";
        $karakter = "ser-";

        $data['tampil_kriteria'] = $this->M_sertifikat->m_kriteria();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_master/sertifikat/v_tambah_sertifikat', $data);
	}
	
	public function proses_tambah_data_sertifikat()
	{
		$data_post['ID_SERTIFIKAT_SNI']= $this->input->post('id_sertifikat_sni');
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_SERTIFIKAT_SNI']= $this->input->post('jenjang_sertifikat_sni');
		$data_post['BOBOT_SERTIFIKAT_SNI']= $this->input->post('bobot_sertifikat_sni');
			
		$this->M_sertifikat->input_data($data_post);

		/* Redirect */
		redirect('admin/C_sertifikat/index');
	}
 
	public function edit_data_sertifikat($ID_SERTIFIKAT_SNI)
	{
		/* Setting where */
		$where["ID_SERTIFIKAT_SNI"] = $ID_SERTIFIKAT_SNI;

		$data['sertifikat_sni'] = $this->M_sertifikat->get_by($ID_SERTIFIKAT_SNI);

		$this->load->view('admin/data_master/sertifikat/v_form_edit_sertifikat', $data);
	}

	public function proses_edit_data_sertifikat()
	{
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_SERTIFIKAT_SNI']= $this->input->post('jenjang_sertifikat_sni');
		$data_post['BOBOT_SERTIFIKAT_SNI']= $this->input->post('bobot_sertifikat_sni');
		
		$where['ID_SERTIFIKAT_SNI'] = $this->input->post('id_sertifikat_sni');

		$this->M_sertifikat->update_data($where,$data_post);	

		redirect('admin/C_sertifikat/index');
	}

	public function hapus_data_sertifikat($ID_SERTIFIKAT_SNI)
	{
		$this->M_sertifikat->delete_data($ID_SERTIFIKAT_SNI);
		
		redirect('admin/C_sertifikat/index');
	}
}