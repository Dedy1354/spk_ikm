<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_sdm extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_sdm');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_sdm"] = $this->M_sdm->get_data();

		$this->load->view('admin/data_master/sdm/v_sdm', $data);
	}
	
	public function tambah_data_sdm()
	{
		$table = 'sdm';
        $id = "ID_SDM";
        $kode = "1";
        $karakter = "sdm-";

         $data['tampil_kriteria'] = $this->M_sdm->m_kriteria();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_master/sdm/v_tambah_sdm', $data);
	}
	
	public function proses_tambah_data_sdm()
	{
		$data_post['ID_SDM']= $this->input->post('id_sdm');
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_SDM']= $this->input->post('jenjang_sdm');
		$data_post['BOBOT_SDM']= $this->input->post('bobot_sdm');
			
		$this->M_sdm->input_data($data_post);

		/* Redirect */
		redirect('admin/C_sdm/index');
	}

	public function edit_data_sdm($ID_SDM)
	{
		/* Setting where */
		$where["ID_SDM"] = $ID_SDM;

		$data['sdm'] = $this->M_sdm->get_by($ID_SDM);

		$this->load->view('admin/data_master/sdm/v_form_edit_sdm', $data);
	}

	public function proses_edit_data_sdm()
	{
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_SDM']= $this->input->post('jenjang_sdm');
		$data_post['BOBOT_SDM']= $this->input->post('bobot_sdm');
		
		$where['ID_SDM'] = $this->input->post('id_sdm');

		$this->M_sdm->update_data($where,$data_post);	

		redirect('admin/C_sdm/index');
	}

	public function hapus_data_sdm($ID_SDM)
	{
		$this->M_sdm->delete_data($ID_SDM);
		
		redirect('admin/C_sdm/index');
	}
}