<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_legalitas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_legalitas');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_legalitas"] = $this->M_legalitas->get_data();

		$this->load->view('admin/data_master/legalitas/v_legalitas', $data);
	}
	
	public function tambah_data_legalitas()
	{
		$table = 'legalitas_usaha';
        $id = "ID_LEGALITAS_USAHA";
        $kode = "1";
        $karakter = "leg-";

        $data['tampil_kriteria'] = $this->M_legalitas->m_kriteria();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_master/legalitas/v_tambah_legalitas', $data);
	}
	
	public function proses_tambah_data_legalitas()
	{
		$data_post['ID_LEGALITAS_USAHA']= $this->input->post('id_legalitas_usaha');
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_LEGALITAS_USAHA']= $this->input->post('jenjang_legalitas_usaha');
		$data_post['BOBOT_LEGALITAS_USAHA']= $this->input->post('bobot_legalitas_usaha');
			
		$this->M_legalitas->input_data($data_post);

		/* Redirect */
		redirect('admin/C_legalitas/index');
	}

	public function edit_data_legalitas($ID_LEGALITAS_USAHA)
	{
		/* Setting where */
		$where["ID_LEGALITAS_USAHA"] = $ID_LEGALITAS_USAHA;

		$data['legalitas_usaha'] = $this->M_legalitas->get_by($ID_LEGALITAS_USAHA);

		$this->load->view('admin/data_master/legalitas/v_form_edit_legalitas', $data);
	}

	public function proses_edit_data_legalitas()
	{
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_LEGALITAS_USAHA']= $this->input->post('jenjang_legalitas_usaha');
		$data_post['BOBOT_LEGALITAS_USAHA']= $this->input->post('bobot_legalitas_usaha');
		
		$where['ID_LEGALITAS_USAHA'] = $this->input->post('id_legalitas_usaha');

		$this->M_legalitas->update_data($where,$data_post);	

		redirect('admin/C_legalitas/index');
	}

	public function hapus_data_legalitas($ID_LEGALITAS_USAHA)
	{
		$this->M_legalitas->delete_data($ID_LEGALITAS_USAHA);
		
		redirect('admin/C_legalitas/index');
	}
}