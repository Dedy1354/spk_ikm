<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_izin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_izin');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_izin"] = $this->M_izin->get_data();

		$this->load->view('admin/data_master/izin/v_izin', $data);
	}
	
	public function tambah_data_izin()
	{
		$table = 'izin_industri';
        $id = "ID_IZIN_INDUSTRI";
        $kode = "1";
        $karakter = "izn-";

        $data['tampil_kriteria'] = $this->M_izin->m_kriteria();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_master/izin/v_tambah_izin', $data);
	}
	
	public function proses_tambah_data_izin()
	{
		$data_post['ID_IZIN_INDUSTRI']= $this->input->post('id_izin_industri');
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_IZIN_INDUSTRI']= $this->input->post('jenjang_izin_industri');
		$data_post['BOBOT_IZIN_INDUSTRI']= $this->input->post('bobot_izin_industri');
			
		$this->M_izin->input_data($data_post);

		/* Redirect */
		redirect('admin/C_izin/index');
	}

	public function edit_data_izin($ID_IZIN_INDUSTRI)
	{
		/* Setting where */
		$where["ID_IZIN_INDUSTRI"] = $ID_IZIN_INDUSTRI;

		$data['izin_industri'] = $this->M_izin->get_by($ID_IZIN_INDUSTRI);

		$this->load->view('admin/data_master/izin/v_form_edit_izin', $data);
	}

	public function proses_edit_data_izin()
	{
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_IZIN_INDUSTRI']= $this->input->post('jenjang_izin_industri');
		$data_post['BOBOT_IZIN_INDUSTRI']= $this->input->post('bobot_izin_industri');
		
		$where['ID_IZIN_INDUSTRI'] = $this->input->post('id_izin_industri');

		$this->M_izin->update_data($where,$data_post);	

		redirect('admin/C_izin/index');
	}

	public function hapus_data_izin($ID_IZIN_INDUSTRI)
	{
		$this->M_izin->delete_data($ID_IZIN_INDUSTRI);
		
		redirect('admin/C_izin/index');
	}
}