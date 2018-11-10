<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mesin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_mesin');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_kondisi_mesin"] = $this->M_mesin->get_data();

		$this->load->view('admin/data_master/kondisi_mesin/v_mesin', $data);
	}
	
	public function tambah_data_kondisi_mesin()
	{
		$table = 'kondisi_mesin';
        $id = "ID_KONDISI_MESIN";
        $kode = "1";
        $karakter = "kon-";

        $data['tampil_kriteria'] = $this->M_mesin->m_kriteria();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_master/kondisi_mesin/v_tambah_mesin', $data);
	}
	
	public function proses_tambah_data_kondisi_mesin()
	{
		$data_post['ID_KONDISI_MESIN']= $this->input->post('id_kondisi_mesin');
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_KONDISI_MESIN']= $this->input->post('jenjang_kondisi_mesin');
		$data_post['BOBOT_KONDISI_MESIN']= $this->input->post('bobot_kondisi_mesin');
			
		$this->M_mesin->input_data($data_post);

		/* Redirect */
		redirect('admin/C_mesin/index');
	}
 
	public function edit_data_kondisi_mesin($ID_KONDISI_MESIN)
	{
		/* Setting where */
		$where["ID_KONDISI_MESIN"] = $ID_KONDISI_MESIN;

		$data['kondisi_mesin'] = $this->M_mesin->get_by($ID_KONDISI_MESIN);

		$this->load->view('admin/data_master/kondisi_mesin/v_form_edit_mesin', $data);
	}

	public function proses_edit_data_kondisi_mesin()
	{
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_KONDISI_MESIN']= $this->input->post('jenjang_kondisi_mesin');
		$data_post['BOBOT_KONDISI_MESIN']= $this->input->post('bobot_kondisi_mesin');
		
		$where['ID_KONDISI_MESIN'] = $this->input->post('id_kondisi_mesin');

		$this->M_mesin->update_data($where,$data_post);	

		redirect('admin/C_mesin/index');
	}

	public function hapus_data_kondisi_mesin($ID_KONDISI_MESIN)
	{
		$this->M_mesin->delete_data($ID_KONDISI_MESIN);
		
		redirect('admin/C_mesin/index');
	}

}