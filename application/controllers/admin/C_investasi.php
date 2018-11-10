<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_investasi extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_investasi');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_investasi"] = $this->M_investasi->get_data();

		$this->load->view('admin/data_master/investasi/v_investasi', $data);
	}
	
	public function tambah_data_investasi()
	{
		$table = 'investasi';
        $id = "ID_INVESTASI";
        $kode = "1";
        $karakter = "inv-";

        $data['tampil_kriteria'] = $this->M_investasi->m_kriteria();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_master/investasi/v_tambah_investasi', $data);
	}
	
	public function proses_tambah_data_investasi()
	{
		$data_post['ID_INVESTASI']= $this->input->post('id_investasi');
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_INVESTASI']= $this->input->post('jenjang_investasi');
		$data_post['BOBOT_INVESTASI']= $this->input->post('bobot_investasi');
			
		$this->M_investasi->input_data($data_post);

		/* Redirect */
		redirect('admin/C_investasi/index');
	}

	public function edit_data_investasi($ID_INVESTASI)
	{
		/* Setting where */
		$where["ID_INVESTASI"] = $ID_INVESTASI;

		$data['investasi'] = $this->M_investasi->get_by($ID_INVESTASI);

		$this->load->view('admin/data_master/investasi/v_form_edit_investasi', $data);
	}

	public function proses_edit_data_investasi()
	{
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_INVESTASI']= $this->input->post('jenjang_investasi');
		$data_post['BOBOT_INVESTASI']= $this->input->post('bobot_investasi');
		
		$where['ID_INVESTASI'] = $this->input->post('id_investasi');

		$this->M_investasi->update_data($where,$data_post);	

		redirect('admin/C_investasi/index');
	}

	public function hapus_data_investasi($ID_INVESTASI)
	{
		$this->M_investasi->delete_data($ID_INVESTASI);
		
		redirect('admin/C_investasi/index');
	}
}