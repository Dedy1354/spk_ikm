<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_partisipasi extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_partisipasi');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_partisipasi"] = $this->M_partisipasi->get_data();

		$this->load->view('admin/data_master/partisipasi/v_partisipasi', $data);
	}
	
	public function tambah_data_partisipasi()
	{
		$table = 'partisipasi';
        $id = "ID_PARTISIPASI";
        $kode = "1";
        $karakter = "par-";

        $data['tampil_kriteria'] = $this->M_partisipasi->m_kriteria();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_master/partisipasi/v_tambah_partisipasi', $data);
	}
	
	public function proses_tambah_data_partisipasi()
	{
		$data_post['ID_PARTISIPASI']= $this->input->post('id_partisipasi');
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_PARTISIPASI']= $this->input->post('jenjang_partisipasi');
		$data_post['BOBOT_PARTISIPASI']= $this->input->post('bobot_partisipasi');
			
		$this->M_partisipasi->input_data($data_post);

		/* Redirect */
		redirect('admin/C_partisipasi/index');
	}
 
	public function edit_data_partisipasi($ID_PARTISIPASI)
	{
		/* Setting where */
		$where["ID_PARTISIPASI"] = $ID_PARTISIPASI;

		$data['partisipasi'] = $this->M_partisipasi->get_by($ID_PARTISIPASI);

		$this->load->view('admin/data_master/partisipasi/v_form_edit_partisipasi', $data);
	}

	public function proses_edit_data_partisipasi()
	{
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_PARTISIPASI']= $this->input->post('jenjang_partisipasi');
		$data_post['BOBOT_PARTISIPASI']= $this->input->post('bobot_partisipasi');
		
		$where['ID_PARTISIPASI'] = $this->input->post('id_partisipasi');

		$this->M_partisipasi->update_data($where,$data_post);	

		redirect('admin/C_partisipasi/index');
	}

	public function hapus_data_($ID_PARTISIPASI)
	{
		$this->M_partisipasi->delete_data($ID_PARTISIPASI);
		
		redirect('admin/C_partisipasi/index');
	}
}